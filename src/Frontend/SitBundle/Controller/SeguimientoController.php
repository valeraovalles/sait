<?php

namespace Frontend\SitBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityRepository;


use Frontend\SitBundle\Entity\Ticket;
use Frontend\SitBundle\Entity\Seguimiento;
use Administracion\UsuarioBundle\Entity\Perfil;

use Frontend\SitBundle\Entity\extras\Correoseguimiento;
use Frontend\SitBundle\Form\extras\CorreoseguimientoType;


/**
 * Ticket controller.
 *
 */
class SeguimientoController extends Controller
{

    public function inicioAction($idticket)
    {
        $em = $this->getDoctrine()->getManager();
        $ticket =  $em->getRepository('SitBundle:Ticket')->find($idticket);
        return $this->render('SitBundle:Seguimiento:inicio.html.twig',array('ticket'=>$ticket));
    }
    
    public function seguimientoprincipalAction($idticket)
    {
        $errorc=null;
        $errore=null;
        $em = $this->getDoctrine()->getManager();
        $ticket =  $em->getRepository('SitBundle:Ticket')->find($idticket);


        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        $usuariounidad =  $em->getRepository('SitBundle:Unidad')->unidadusuario($idusuario);

        if($ticket->getEstatus()!='5' and $ticket->getUnidad()->getId()!=$usuariounidad[0]->getId() or $ticket->getEstatus()=='5' and $ticket->getUnidad()->getId()!=$usuariounidad[0]->getId()){
            $this->get('session')->getFlashBag()->add('alert', 'DEJA DE ESTAR INVENTANDO VAINAS');
            return $this->redirect($this->generateUrl('sit_homepage'));
        }

        $seguimiento =  $em->getRepository('SitBundle:Seguimiento')->findByTicket($idticket);
        
        if($ticket->getEstatus()!=6){
            $consulta = $em->createQuery('update SitBundle:Ticket t set t.estatus= 5 WHERE t.id = :id');
            $consulta->setParameter('id', $idticket);
            $consulta->execute();
        }

        
        $cs = new Correoseguimiento();
        $formcs   = $this->createForm(new CorreoseguimientoType(), $cs);

        return $this->render('SitBundle:Seguimiento:principal.html.twig',array('ticket'=>$ticket,'seguimiento'=>$seguimiento,'formcs'=>$formcs->createView(),'errore'=>$errore,'errorc'=>$errorc));
        
    }
    
    public function guardacorreoAction(Request $request,$idticket)
    {
        $errore=null;
        $errorc=null;
        $em = $this->getDoctrine()->getManager();
        
        $cs  = new Correoseguimiento();
        $formcs = $this->createForm(new CorreoseguimientoType(), $cs);
        $formcs->bind($request);
        
        $ticket =  $em->getRepository('SitBundle:Ticket')->find($idticket);
        $seguimiento =  $em->getRepository('SitBundle:Seguimiento')->findByTicket($idticket);
        
        

        if ($formcs->isValid()) {

            $entity  = new Seguimiento;
            $entity->setFecha(new \DateTime("now"));
            $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
            $perfil = $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);
            $entity->setResponsable($perfil);

            $ticket = $em->getRepository('SitBundle:Ticket')->find($idticket);
            $entity->setTicket($ticket);

            
            $evento="<div>Para: ".$formcs->getData()->getPara()."</div>";
            $evento .="<div>Asunto: ".$formcs->getData()->getAsunto()."</div><br>";
            $evento .="<div>".$formcs->getData()->getCuerpo()."</div>";
            
            $entity->setEvento($evento);

            $entity->setTipo("e");
            
            //GUARDO EL ARCHIVO
            if($formcs->getData()->getFile()){
                
                $file=$formcs->getData()->getFile();
   
                
                $tamano=$file->getClientSize();
                $extension = $file->guessExtension();
                $nombre=$file->getClientOriginalName();
                $nombre=explode(".", $nombre);
                $nombre=$nombre[0];

                $extensiones=array('jpg','jpeg','png','gif','doc','odt','xls','xlsx','docx','pdf','zip','rar');
                //valido las extensiones
                if (!array_search($extension,$extensiones)) {
                    $errore[]="El formato de archivo que intenta subir no está permitido.";
                    return $this->render('SitBundle:Seguimiento:principal.html.twig',array('ticket'=>$ticket,'seguimiento'=>$seguimiento,'formcs'=>$formcs->createView(),'errorc'=>$errorc,'errore'=>$errore));
   
                }
                
                $nombre=str_replace(array(" ","/",".","_","-"),array("","","","",""),trim($nombre)).\date("Gis").'.'.$extension;

                //GUARDO EL ARCHIVO
                if($file->move('uploads/sit/',$nombre) )
                {
                     $entity->setArchivo($nombre);
                }

            }//fin archivo
            
            $em->persist($entity);
            $em->flush();

            $a=explode(",",$formcs->getData()->getPara());
            $email='';
            foreach ($a as $p) {
                $email[]=$p;
            }
            $email[]=$ticket->getUnidad()->getCorreo();
            
            //CORREO
            $message = \Swift_Message::newInstance()  
            ->setSubject($formcs->getData()->getAsunto())  
            ->setFrom('aplicaciones@telesurtv.net')     
            ->setTo($email)
            ->setBody($formcs->getData()->getCuerpo().'<br><b>Comentario de la solicitud:</b> '.$ticket->getSolicitud().',<br><br><b>Nota: Puedes responder este correo directamente desde el Sit haciendo clic en tu solicitud marcada de color naranja así como ver el seguimiento de la misma.</b>', 'text/html');
            
            if(isset($nombre))
                $message->attach(\Swift_Attachment::fromPath('uploads/sit/'.$nombre));
            
            $this->get('mailer')->send($message); 
            //FIN CORREO
            
            
            $this->get('session')->getFlashBag()->add('notice', 'Se ha enviado el correo exitosamente!');
            return $this->redirect($this->generateUrl('sit_seguimientoprincipal', array('idticket' => $idticket)));
        }
        return $this->render('SitBundle:Seguimiento:principal.html.twig',array('ticket'=>$ticket,'seguimiento'=>$seguimiento,'formcs'=>$formcs->createView(),'errorc'=>$errorc,'errore'=>$errore));
        

    }
    
    public function guardacomentarioAction(Request $request,$idticket)
    {
        $em = $this->getDoctrine()->getManager();
        $errorc=null;
        $errore=null;
        $datos=$request->request->all();
        
        if(isset($datos['elm2']) and $datos['elm2']!='')
            $datos=$datos['elm2'];
        else{       
        
            $cs  = new Correoseguimiento();
            $formcs = $this->createForm(new CorreoseguimientoType(), $cs);
            $ticket =  $em->getRepository('SitBundle:Ticket')->find($idticket);
            $seguimiento =  $em->getRepository('SitBundle:Seguimiento')->findByTicket($idticket);

            $errorc[]="El comentario no debe estar en blanco.";
            return $this->render('SitBundle:Seguimiento:principal.html.twig',array('ticket'=>$ticket,'seguimiento'=>$seguimiento,'formcs'=>$formcs->createView(),'errorc'=>$errorc,'errore'=>$errore));
        }

        $entity  = new Seguimiento;
        $entity->setFecha(new \DateTime("now"));
              
        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        $perfil = $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);
        $entity->setResponsable($perfil);
        
        $ticket = $em->getRepository('SitBundle:Ticket')->find($idticket);
        $entity->setTicket($ticket);
        
        $entity->setEvento($datos);
        
        $entity->setTipo("c");
        
        $em->persist($entity);
        $em->flush();  
        

        
        //CORREO
        $message = \Swift_Message::newInstance()     // we create a new instance of the Swift_Message class
        ->setSubject('Sit-Comentario')     // we configure the title
        ->setFrom($perfil->getUser()->getUsername().'@telesurtv.net')     // we configure the sender
        ->setTo($ticket->getUnidad()->getCorreo())    // we configure the recipient
        ->setBody($datos.'<br><b>Comentario de la solicitud:</b> '.$ticket->getSolicitud().'<br><br><b>ID:</b> '.$ticket->getId(), 'text/html');

        $this->get('mailer')->send($message);    // then we send the message.
        //FIN CORREO


        $this->get('session')->getFlashBag()->add('notice', 'Se ha enviado el comentario exitosamente!');
        return $this->redirect($this->generateUrl('sit_seguimientoprincipal', array('idticket' => $idticket)));
    }
    
    public function cerrarseguimientoAction($idticket)
    {
        $error=null;
        $em = $this->getDoctrine()->getManager();
        $ticket =  $em->getRepository('SitBundle:Ticket')->find($idticket);

        return $this->render('SitBundle:Seguimiento:cerrarseguimiento.html.twig',array('ticket'=>$ticket,'error'=>$error));
        die;
    }
    
    public function guardacerrarseguimientoAction(Request $request,$idticket)
    {
        $error=null;
        $em = $this->getDoctrine()->getManager();
        $ticket =  $em->getRepository('SitBundle:Ticket')->find($idticket);
        
        $datos=$request->request->all();
        if(isset($datos['solucion']) and $datos['solucion']!='')
            $solucion=$datos['solucion'];
        else{
            $error[]="El comentario no debe estar en blanco.";
            return $this->render('SitBundle:Seguimiento:cerrarseguimiento.html.twig',array('ticket'=>$ticket,'error'=>$error));
 
        }
        
        $fechactual = date_create_from_format('Y-m-d', \date("Y-m-d"));
        $horaactual=new \DateTime(\date("G:i:s"));


        //actualizo campos en ticket
        $query = $em->createQuery('update SitBundle:Ticket t set t.solucion= :solucion, t.fechasolucion= :fechasolucion, t.horasolucion= :horasolucion, t.estatus=6 WHERE t.id = :idticket');
        $query->setParameter('fechasolucion', $fechactual);
        $query->setParameter('horasolucion', $horaactual);
        $query->setParameter('solucion', $solucion);
        $query->setParameter('idticket', $idticket);
        $query->execute();
        
        //asigno para saber quien cerro
        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        $user =  $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);
        $ticket->addUser($user);
        $em->flush();
        
        
        $this->get('session')->getFlashBag()->add('notice', 'El seguimiento se ha cerrado exitosamente');
        return $this->redirect($this->generateUrl('ticket_show',array('id'=>$idticket)));
        die;
    }
}