<?php

namespace Frontend\SitBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\SitBundle\Entity\Ticket;
use Frontend\SitBundle\Entity\Reasignado;
use Frontend\SitBundle\Entity\Unidad;
use Frontend\SitBundle\Form\TicketType;

use Administracion\UsuarioBundle\Entity\Perfil;
use Administracion\UsuarioBundle\Form\PerfilType;
use Administracion\UsuarioBundle\Entity\Extension;
use Administracion\UsuarioBundle\Form\ExtensionType;

use Doctrine\ORM\EntityRepository;


/**
 * Ticket controller.
 *
 */
class TicketController extends Controller
{

    public function ticketgeneralAction()
    {

        $em = $this->getDoctrine()->getManager();

        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        $usuariounidad =  $em->getRepository('SitBundle:Unidad')->unidadusuario($idusuario);

        $tickets = $em->getRepository('SitBundle:Ticket')->tickets();

        $dql = "select t from SitBundle:Ticket t where t.estatus!=4 and t.estatus!=3 order by  t.estatus ASC, t.fechasolicitud DESC, t.horasolicitud DESC";
        $query = $em->createQuery($dql);
        $tickets = $query->getResult();

        //cuento la cantidad de tickets por unidad
        $nuevos=0;$asignados=0;


        foreach ($tickets as $t){ 
                if($t->getEstatus()=='1')
                    $nuevos=$nuevos+1;
                else if($t->getEstatus()=='2')
                    $asignados=$asignados+1;
            
        }
        //FIN

        return $this->render('SitBundle:Ticket:general.html.twig', array(
            'entities' => $tickets,
            'nuevos'=> $nuevos,
            'asignados'=> $asignados
        ));
    }

    public function filtrarsolicitud($solicitud){

        $solicitud=strtolower($solicitud);

        $eliminar=array(
            "hola","muchas gracias","buenos dias,","buenos dias","buenos días,","buenos días","buen día","buenas tardes,","buenas tardes","saludos","chicos:",
            "buenos días","gracias","la presente es para","la presente es","por medio de la presente se","Buenas noches,",
            "Buenas noches","el presente es para","por favor","favor","porfavor","chicos", "por su valiosa colaboracion", "jhoan",
            "urgente","esto con caracter de urgencia","con caracter de urgencia","Se agradece su valiosa colaboracion","carmen",
            "buenas tardes el motivo es para","el motivo es para","el motivo es para","por su colaboracion","por su colaboración","buen dia","Buenos tardes"
        );

        $solicitud=str_replace($eliminar, array(), $solicitud);
        return $solicitud;
    }
    function filtrarsms($palabrotas) 
    {     
        $texto_limpio= $palabrotas; 
        //$texto_limpio= strtolower($palabrotas);                
        $texto_limpio= rtrim(ltrim($texto_limpio));
        $texto_limpio = str_replace("á", "a", $texto_limpio);
        $texto_limpio = str_replace("é", "e", $texto_limpio); 
        $texto_limpio = str_replace("í", "i", $texto_limpio);
        $texto_limpio = str_replace("ó", "o", $texto_limpio);
        $texto_limpio = str_replace("ú", "u", $texto_limpio);
        $texto_limpio = str_replace("Á", "A", $texto_limpio);
        $texto_limpio = str_replace("É", "E", $texto_limpio); 
        $texto_limpio = str_replace("Í", "I", $texto_limpio);
        $texto_limpio = str_replace("Ó", "O", $texto_limpio);
        $texto_limpio = str_replace("Ú", "U", $texto_limpio);
        $texto_limpio = str_replace("ñ", "n", $texto_limpio);       
        $texto_limpio = str_replace("ü", "u", $texto_limpio);
        $texto_limpio = str_replace("'", "", $texto_limpio);       
        $texto_limpio = str_replace('', "", $texto_limpio);
        $texto_limpio = str_replace('', "", $texto_limpio);
        $texto_limpio = str_replace("", "", $texto_limpio);
        $texto_limpio = str_replace("", "", $texto_limpio);
        $texto_limpio = str_replace('°', "", $texto_limpio);
        $texto_limpio = str_replace("Ž", "", $texto_limpio);
        $texto_limpio = str_replace('ô', "o", $texto_limpio);
        $texto_limpio = str_replace('õ', "o", $texto_limpio);
        $texto_limpio = str_replace('ç', "c", $texto_limpio);
        $texto_limpio = str_replace('à', "a", $texto_limpio);
        $texto_limpio = str_replace('è', "e", $texto_limpio);
        $texto_limpio = str_replace('û', "u", $texto_limpio);
        $texto_limpio = str_replace('Ñ', "n", $texto_limpio);
        $texto_limpio = str_replace('ã', "a", $texto_limpio);
        $texto_limpio = str_replace("š", "", $texto_limpio);
        $texto_limpio = str_replace("", "", $texto_limpio);
           
        $find = array('&', '\r\n', '\n', '+'); 
        $texto_limpio = str_replace ($find, ' ', $texto_limpio);

        $sustituye = array("\r\n", "\n\r", "\n", "\r");
        $texto_limpio = str_replace($sustituye, "", $texto_limpio); 
    
        $texto_limpio=strip_tags($texto_limpio);
        return $texto_limpio; 
    }
    public function asignadosolucionAction(Request $request,$id)
    {

        $datos=$request->request->all();
        $datos=$datos['form'];

        if($datos['solucion']==null){
            $this->get('session')->getFlashBag()->add('alert', 'DEBE ESCRIBIR UNA SOLUCIÓN');
            return $this->redirect($this->generateUrl('ticket_showasignado',array('id'=>$id)));
        }

        $fechactual = date_create_from_format('Y-m-d', \date("Y-m-d"));
        $horaactual=new \DateTime(\date("G:i:s"));

        $em = $this->getDoctrine()->getManager();
        //actualizo campos en ticket
        $query = $em->createQuery('update SitBundle:Ticket t set t.solucion= :solucion, t.fechasolucion= :fechasolucion, t.horasolucion= :horasolucion, t.estatus=4 WHERE t.id = :idticket');
        $query->setParameter('fechasolucion', $fechactual);
        $query->setParameter('horasolucion', $horaactual);
        $query->setParameter('solucion', $datos['solucion']);
        $query->setParameter('idticket', $id);
        $query->execute();


        //CORREO
        $ticket = $em->getRepository('SitBundle:Ticket')->find($id);
        //$ticket->getUnidad()->getCorreo();
        //$ticket->getSolicitante()->getUser()->getUsername();
        $message = \Swift_Message::newInstance()     // we create a new instance of the Swift_Message class
        ->setSubject('Sit-Cerrado')     // we configure the title
        ->setFrom('sit@telesurtv.net')     // we configure the sender
        ->setTo(array($ticket->getUnidad()->getCorreo(),$ticket->getSolicitante()->getUser()->getUsername().'@telesurtv.net'))    // we configure the recipient
        ->setBody( $this->renderView(
                'SitBundle:Correo:solucion.html.twig',
                array('ticket' => $ticket)
            ), 'text/html');

        $this->get('mailer')->send($message);    // then we send the message.
        //FIN CORREO

        $this->get('session')->getFlashBag()->add('notice', 'EL TICKET SE HA CERRADO SATISFACTORIAMENTE');
        return $this->redirect($this->generateUrl('ticket_show',array('id'=>$id)));


    }

    public function showasignadoAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        //busco si alguien tiene asignado el ticket
        $ticketusuario = $em->getRepository('SitBundle:Ticket')->buscaticketusuario($id);
        if(!empty($ticketusuario)){
            foreach($ticketusuario[0]->getUser() as $usr){
                $usuarioticket=$usr;
            }
        } else $usuarioticket=null;


        //busco un ticket en especifico y valido que tenga categoria asignada
        $ticket = $em->getRepository('SitBundle:Ticket')->find($id);

        if($ticket->getCategoria()==null and $ticket->getSubcategoria()==null){
            return $this->redirect($this->generateUrl('ticket_asignarcatsub', array('id' => $id))); 
        }

        //traigo los datos del usuario conectado
        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        $datosusuario = $em->getRepository('UsuarioBundle:User')->datosusuario($idusuario);
        //busco si el usuario ya posee una unidad asignada para eliminarla
        $usuariounidad =  $em->getRepository('SitBundle:Unidad')->unidadusuario($idusuario);
        $usuariosunidad =  $em->getRepository('SitBundle:Unidad')->usuariosunidad($usuariounidad[0]->getId());


        $deleteForm = $this->createDeleteForm($id);

        $dql = "select u from SitBundle:Unidad u";
        $query = $em->createQuery($dql);
        $unidad = $query->getResult();


        //reasignado
        $dql = "select r from SitBundle:Reasignado r where r.ticket= :id order by r.id DESC";
        $query = $em->createQuery($dql);
        $query->setParameter('id',$id);
        $query->setMaxResults(1);
        $reasignado = $query->getResult();


        $form = $this->createFormBuilder()
                ->add('solucion', 'textarea'
                )
        ->getForm();

        return $this->render('SitBundle:Ticket:showasignado.html.twig', array(
            'entity'      => $ticket,
            'delete_form' => $deleteForm->createView(),
            'datosusuario'=>$datosusuario,
            'unidad'=>$unidad,
            'usuariosunidad'=>$usuariosunidad,
            'usuarioticket'=>$usuarioticket,
            'idunidad'=>$usuariounidad[0]->getId(),
            'reasignado'=>$reasignado,
            'form'=>$form->createView(),
        ));
    }

    public function asignadoAction()
    {
        $em = $this->getDoctrine()->getManager();

        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        $usuariounidad =  $em->getRepository('SitBundle:Unidad')->unidadusuario($idusuario);
        $entities = $em->getRepository('SitBundle:Ticket')->ticketsasignados($idusuario);

        return $this->render('SitBundle:Ticket:asignado.html.twig', array(
            'entities' => $entities,
        ));
    }

    public function asigreasigAction(Request $request,$id)
    {        
        $datos=$request->request->all();
        $em = $this->getDoctrine()->getManager();
        $ticket = $em->getRepository('SitBundle:Ticket')->find($id);

        if(empty($datos)){
            $this->get('session')->getFlashBag()->add('alert', 'Debe seleccionar una opción.');
            return $this->redirect($this->generateUrl('ticket_show', array('id' => $id)));
        }

        $datos=explode("-", $datos['datos']);

        if($datos[0]=='asignar'){
            $user = $em->getRepository('UsuarioBundle:Perfil')->find($datos[1]);
            
            //busco si hay usuario asignado para borrarlo
            $ticketusuario = $em->getRepository('SitBundle:Ticket')->buscaticketusuario($id);
            if(!empty($ticketusuario)){
                foreach($ticketusuario[0]->getUser() as $usr){
                    $idusuarioticket=$usr->getId();
                }
                $useranterior = $em->getRepository('UsuarioBundle:Perfil')->find($idusuarioticket);
                $ticket->removeUser($useranterior);
            }

            $ticket->addUser($user);
            $em->flush();

            //actualizo campos en ticket
            $query = $em->createQuery('update SitBundle:Ticket t set t.estatus=2 WHERE t.id = :idticket');
            $query->setParameter('idticket', $id);
            $query->execute();

            //echo $user->getUser()->getUsername();

            //CORREO
            $message = \Swift_Message::newInstance()     // we create a new instance of the Swift_Message class
            ->setSubject('Sit-Asignado')     // we configure the title
            ->setFrom('sit@telesurtv.net')     // we configure the sender
            ->setTo($user->getUser()->getUsername().'@telesurtv.net')     // we configure the recipient
            ->setBody( $this->renderView(
                    'SitBundle:Correo:asignado.html.twig',
                    array('ticket' => $ticket,'usuario'=>$user)
                ), 'text/html');

            $this->get('mailer')->send($message);     // then we send the message.
            //FIN CORREO

            $this->get('session')->getFlashBag()->add('notice', 'El ticket fie asignado exitosamente a '.ucfirst($user->getPrimerNombre().' '.$user->getPrimerapellido()).'.');
            return $this->redirect($this->generateUrl('ticket_show', array('id' => $id)));
        }


        else if($datos[0]=='reasignar'){

            $unidad = $em->getRepository('SitBundle:Unidad')->find($datos[1]);

            //actualizo campos en ticket
            $query = $em->createQuery('update SitBundle:Ticket t set t.reasignado=true, t.unidad= :idunidad, t.estatus=3, t.categoria=null, t.subcategoria=null WHERE t.id = :idticket');
            $query->setParameter('idunidad', $datos[1]);
            $query->setParameter('idticket', $id);
            $query->execute();

            //guardo en tabla reasignado
            $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
            $user = $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);
            $reasig=new reasignado;
            $reasig->setUser($user);
            $reasig->setTicket($ticket);
            $em->persist($reasig);
            $em->flush();

            //busco si hay usuario asignado para borrarlo
            $ticketusuario = $em->getRepository('SitBundle:Ticket')->buscaticketusuario($id);
            if(!empty($ticketusuario)){
                foreach($ticketusuario[0]->getUser() as $usr){
                    $idusuarioticket=$usr->getId();
                }
                $useranterior = $em->getRepository('UsuarioBundle:Perfil')->find($idusuarioticket);
                $ticket->removeUser($useranterior);
                $em->flush();
            }

            //CORREO
            $em = $this->getDoctrine()->getManager();
            $dql   = "SELECT r FROM SitBundle:Reasignado r where r.user= :iduser and r.ticket= :idticket";
            $query = $em->createQuery($dql);
            $query->setParameter('iduser', $idusuario);
            $query->setParameter('idticket', $id);
            $reasignado = $query->getResult(); 

            //echo $unidad->getCorreo();

            $message = \Swift_Message::newInstance()     // we create a new instance of the Swift_Message class
            ->setSubject('Sit-Reasignado')     // we configure the title
            ->setFrom('sit@telesurtv.net')     // we configure the sender
            ->setTo($unidad->getCorreo())     // we configure the recipient
            ->setBody( $this->renderView(
                    'SitBundle:Correo:reasignado.html.twig',
                    array('ticket' => $ticket,'unidad'=>$unidad,'reasignado'=>$reasignado)
                ), 'text/html');

            $this->get('mailer')->send($message);    // then we send the message.
            //FIN CORREO

            $this->get('session')->getFlashBag()->add('notice', 'Ticket reasignado exitosamente a '.ucfirst($unidad->getDescripcion()).'.');
            return $this->redirect($this->generateUrl('ticket'));
        }
        
        

    }
    public function listausuariounidadAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UsuarioBundle:Perfil')->findAll();

        return $this->render('SitBundle:Ticket:listausuariounidad.html.twig', array(
            'entities' => $entities,
        ));
    }

    public function usuariounidadAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UsuarioBundle:Perfil')->find($id);


        //busco si el usuario ya posee una unidad asignada para que no se liste en el select
        $usuariounidad =  $em->getRepository('SitBundle:Unidad')->unidadusuario($id);

        if($usuariounidad){
            $dql = "select u from SitBundle:Unidad u where u.id!= :id order by u.descripcion ASC";
            $query = $em->createQuery($dql);
            $query->setParameter('id',$usuariounidad[0]->getId());
        }
        else{
            $dql = "select u from SitBundle:Unidad u order by u.descripcion ASC";
            $query = $em->createQuery($dql);
        }

            $unidades = $query->getResult();

        foreach ($unidades as $value) {
            $unidad[$value->getId()]=$value->getDescripcion();
        }
        
        $form = $this->createFormBuilder()
                ->add('unidad', 'choice', array(
                    'choices'   => $unidad,
                    'empty_value' => 'Seleccione...'
                ))
        ->getForm();

        return $this->render('SitBundle:Ticket:usuariounidad.html.twig', array(
            'entity' => $entities,
            'form'   => $form->createView(),
            'usuariounidad'=>$usuariounidad 
        ));
    }

    public function asignarusuariounidadAction(Request $request,$id)
    {
        $datos=$request->request->all();

        if(empty($datos)){
            $this->get('session')->getFlashBag()->add('alert', 'Debe seleccionar una unidad.');
            return $this->redirect($this->generateUrl('ticket_usuariounidad', array('id' => $id)));
        }

        else $idunidad=$datos['form']['unidad'];

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('UsuarioBundle:Perfil')->find($id);

        //busco si el usuario ya posee una unidad asignada para eliminarla
        $usuariounidad =  $em->getRepository('SitBundle:Unidad')->unidadusuario($id);

        if($usuariounidad){
            $unidad = $em->getRepository('SitBundle:Unidad')->find($usuariounidad[0]->getId());
            $unidad->removeUser($user);
            $em->flush();
        }
        

        $unidad = $em->getRepository('SitBundle:Unidad')->find($idunidad);
        $unidad->addUser($user);
        $em->flush();

        $this->get('session')->getFlashBag()->add('notice', 'Unidad asociada con exito.');
        return $this->redirect($this->generateUrl('ticket_usuariounidad', array('id' => $id)));

    }

    /**
     * Lists all Ticket entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        $usuariounidad =  $em->getRepository('SitBundle:Unidad')->unidadusuario($idusuario);

        $entities = $em->getRepository('SitBundle:Unidad')->ticketsunidad($usuariounidad[0]->getId());

        //cuento la cantidad de tickets por unidad
        $tickets = $em->getRepository('SitBundle:Ticket')->findAll();
        $contador[1]['nuevo']=0;$contador[1]['asignado']=0;$contador[1]['cerrado']=0;
        $contador[2]['nuevo']=0;$contador[2]['asignado']=0;$contador[2]['cerrado']=0;
        $contador[3]['nuevo']=0;$contador[3]['asignado']=0;$contador[3]['cerrado']=0;
        $contador[4]['nuevo']=0;$contador[4]['asignado']=0;$contador[4]['cerrado']=0;

        foreach ($tickets as $t){ 
            if($t->getEstatus()!='3'){

                if($t->getEstatus()=='1')
                    $contador[$t->getUnidad()->getId()]['nuevo']=$contador[$t->getUnidad()->getId()]['nuevo']+1;
                else if($t->getEstatus()=='2')
                    $contador[$t->getUnidad()->getId()]['asignado']=$contador[$t->getUnidad()->getId()]['asignado']+1;
                else if($t->getEstatus()=='4')
                    $contador[$t->getUnidad()->getId()]['cerrado']=$contador[$t->getUnidad()->getId()]['cerrado']+1;
            }
            
        }
        //FIN


        if(empty($entities))$entities=null;

        return $this->render('SitBundle:Ticket:index.html.twig', array(
            'entities' => $entities,
            'contador'=> $contador
        ));
    }
    /**
     * Creates a new Ticket entity.
     *
     */
    public function createAction(Request $request)
    {
        $datos=$request->request->all();
        //RECIBO LOS DATOS QUE SE ENVIAN DESDE EL FORMULARIO
        $solicitud=$datos['frontend_sitbundle_tickettype']['solicitud'];
        if(isset($datos['frontend_sitbundle_tickettype']['unidad']))
        $idunidad=$datos['frontend_sitbundle_tickettype']['unidad'];
        $extensionusuario=$datos['extension']['extension'];
        //FIN

        //GENERO LOS FORMULARIOS
        $entity  = new Ticket();
        $form = $this->createForm(new TicketType(), $entity);
        $form->bind($request);
        $entity2  = new Extension();
        $form2 = $this->createForm(new ExtensionType(), $entity2);
        $form2->bind($request);
        //FIN

        //CONSULTO LOS DATOS DEL USUARIO
        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $datosusuario =  $em->getRepository('UsuarioBundle:User')->datosusuario($idusuario);
        //FIN

        //AGREGO LA EXTENSION YA QUE LA TENGO ASIGNADA MEDIANTE VALUE AL CAMPO EN TWIG, SI NO LO HAGO TRAE LA EXT DE LA BD
        $datosusuario->setExtension($extensionusuario);
        //FIN

        //CONSULTO LOS TICKETS DEL USUARIO PARA LA PARTE DERACHA DE LA INTERFAZ DE USUARIO
        $dql = "select t from SitBundle:Ticket t where t.solicitante= :id order by t.estatus ASC";
        $query = $em->createQuery($dql);
        $query->setParameter('id',$idusuario);
        $ticketusuario = $query->getResult();
        //FIN

        if ($form->isValid() and $form2->isValid()) {

            $perfil =  $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);

            //ASOCIO EL SOLICITANTE
            $entity->setSolicitante($perfil);

            //GUARDO LA FECHA Y HORA DE SOLICITUD
            $fechactual = date_create_from_format('Y-m-d', \date("Y-m-d"));
            $entity->setFechaSolicitud($fechactual);
            $entity->setHoraSolicitud(new \DateTime(\date("G:i:s")));

            //ASIGNO ESTATUS NUEVO
            $entity->setEstatus(1);

            //GUARDO LA SOLICITUD FILTRANDO LO ESCRITO POR EL USUARIO
            $solicitud=$this->filtrarsolicitud(strtolower($solicitud));
            $solicitud=ucfirst(trim($solicitud));
            $entity->setSolicitud($solicitud);

            //GUARDO EL ARCHIVO
            if($form['file']->getData()){
      
                $file=$form['file']->getData();

                $tamaño=number_format($file->getClientSize(),0, ',', '')/1000;
                $extension = $file->guessExtension();
                $nombre=$file->getClientOriginalName();
                $nombre=explode(".", $nombre);
                $nombre=$nombre[0];

                //valido tamaño
                if ($tamaño>2000) {
                    $this->get('session')->getFlashBag()->add('alert', 'El archivo no puede ser mayor a 2MB.');

                    return $this->render('SitBundle:Default:index.html.twig', array(
                        'form'   => $form->createView(),
                        'form2'   => $form2->createView(),
                        'ticketusuario'=>$ticketusuario,
                        'datosusuario'=>$datosusuario
                    ));

                }
                $extensiones=array('jpg','jpeg','png','gif','doc','odt','xls','xlsx','docx','pdf');
                //valido las extensiones
                if (!array_search($extension,$extensiones)) {
                    $this->get('session')->getFlashBag()->add('alert', 'El formato de archivo que intenta subir no está permitido.');

                    return $this->render('SitBundle:Default:index.html.twig', array(
                        'form'   => $form->createView(),
                        'form2'   => $form2->createView(),
                        'ticketusuario'=>$ticketusuario,
                        'datosusuario'=>$datosusuario
                    ));
                }

                //GUARDO EL ARCHIVO
                if($file->move('uploads/sit/',$nombre.'_'.\date("Gis").'.'.$extension) )
                {
                     $entity->setArchivo($nombre.'_'.\date("Gis").'.'.$extension);
                }

            }
            //fin archivo

            $em->persist($entity);
            $em->flush();

            //actualizo la extensión del usuario
            $query = $em->createQuery('update UsuarioBundle:Perfil p set p.extension= :extension WHERE p.id = :id');
            $query->setParameter('extension', $extensionusuario);
            $query->setParameter('id', $perfil->getId());
            $query->execute();


            //envio correo
            $ticketcreado['solicitante']=$perfil->getPrimerNombre().' '.$perfil->getPrimerApellido();
            $ticketcreado['extension']=$extensionusuario;
            $ticketcreado['solicitud']=$solicitud;

            $unidad =  $em->getRepository('SitBundle:Unidad')->find($idunidad);
            //$unidad->getCorreo();


            $message = \Swift_Message::newInstance()     // we create a new instance of the Swift_Message class
            ->setSubject('Sit-Solicitud')     // we configure the title
            ->setFrom('sit@telesurtv.net')     // we configure the sender
            ->setTo($unidad->getCorreo())     // we configure the recipient
            ->setBody( $this->renderView(
                    'SitBundle:Correo:solicitud.html.twig',
                    array('ticket' => $ticketcreado)
                ), 'text/html');
            $this->get('mailer')->send($message);    // then we send the message.
            //fin enviar correo


            $message = \Swift_Message::newInstance()     // we create a new instance of the Swift_Message class
            ->setSubject('telesurwebimk:*t3l3SURcl4v3* @Sit:'.substr(ucfirst($this->filtrarsms($solicitud)),0,150))    // we configure the title
            ->setFrom('contactenos@telesurtv.net')
            ->setTo($unidad->getSms());
            $this->get('mailer')->send($message);     // then we send the message.
            //fin enviar correo

            $this->get('session')->getFlashBag()->add('notice', 'TU SOLICITUD SE HA REALIZADO EXITOSAMENTE');

            return $this->redirect($this->generateUrl('sit_homepage'));
        }

        return $this->render('SitBundle:Default:index.html.twig', array(
            'form'   => $form->createView(),
            'form2'   => $form2->createView(),
            'ticketusuario'=>$ticketusuario,
            'datosusuario'=>$datosusuario
        ));
    }

    /**
     * Displays a form to create a new Ticket entity.
     *
     */
    public function newAction()
    {
        $entity = new Ticket();
        $form   = $this->createForm(new TicketType(), $entity);

        return $this->render('SitBundle:Ticket:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    public function catsubAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        //busco un ticket en especifico
        $ticket = $em->getRepository('SitBundle:Ticket')->find($id);

        /*if($ticket->getCategoria()!=null and $ticket->getSubcategoria()!=null){
            return $this->redirect($this->generateUrl('ticket_show', array('id' => $id))); 
        }*/

        //consulto las categorias de la unidad
        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        //busco si el usuario ya posee una unidad asignada para eliminarla
        $usuariounidad =  $em->getRepository('SitBundle:Unidad')->unidadusuario($idusuario);
        $dql = "select s from SitBundle:Subcategoria s join s.categoria c where c.id=s.categoria and c.unidad= :idunidad ";
        $query = $em->createQuery($dql);
        $query->setParameter('idunidad', $usuariounidad[0]->getId());
        $subcat = $query->getResult();


        foreach ($subcat as $value) {
            $arraycatsub[$value->getCategoria()->getCategoria()][]=array('idcat'=>$value->getCategoria()->getId(),'idsub'=>$value->getId(),'subcategoria'=>$value->getSubcategoria());
        }

        $dql = "select u from SitBundle:Unidad u";
        $query = $em->createQuery($dql);
        $unidad = $query->getResult();

        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        //busco si el usuario ya posee una unidad asignada para eliminarla
        $usuariounidad =  $em->getRepository('SitBundle:Unidad')->unidadusuario($idusuario);



        return $this->render('SitBundle:Ticket:catsub.html.twig', array(
            'arraycatsub' => $arraycatsub,
            'id'=>$id,
            'ticket'=>$ticket,
            'unidad'=>$unidad,
            'idunidad'=>$usuariounidad[0]->getId()

        ));
    }


    public function guardacatsubAction(Request $request,$id)
    {

        $datos=$request->request->all();
        $datos=$datos['subcat'];
        $ids=explode("-", $datos);

        if(empty($datos)){
            $this->get('session')->getFlashBag()->add('alert', 'Debe seleccionar una subcategoria.');
            return $this->redirect($this->generateUrl('ticket_asignarcatsub', array('id' => $id)));
        }


        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('update SitBundle:Ticket t set t.categoria= :idcat, t.subcategoria= :idsub WHERE t.id = :id');
        $query->setParameter('idsub', $ids[1]);
        $query->setParameter('idcat', $ids[0]);
        $query->setParameter('id', $id);
        $query->execute();  

        $this->get('session')->getFlashBag()->add('alert', 'Categoria asignada exitosamente');
        return $this->redirect($this->generateUrl('ticket_show', array('id' => $id)));      

    }
    /**
     * Finds and displays a Ticket entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        //busco si alguien tiene asignado el ticket
        $ticketusuario = $em->getRepository('SitBundle:Ticket')->buscaticketusuario($id);
        if(!empty($ticketusuario)){
            foreach($ticketusuario[0]->getUser() as $usr){
                $usuarioticket=$usr;
            }
        } else $usuarioticket=null;


        //busco un ticket en especifico y valido que tenga categoria asignada
        $ticket = $em->getRepository('SitBundle:Ticket')->find($id);

        if($ticket->getCategoria()==null and $ticket->getSubcategoria()==null){
            return $this->redirect($this->generateUrl('ticket_asignarcatsub', array('id' => $id))); 
        }

        //traigo los datos del usuario conectado
        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        $datosusuario = $em->getRepository('UsuarioBundle:User')->datosusuario($idusuario);
        //busco si el usuario ya posee una unidad asignada para eliminarla
        $usuariounidad =  $em->getRepository('SitBundle:Unidad')->unidadusuario($idusuario);
        $usuariosunidad =  $em->getRepository('SitBundle:Unidad')->usuariosunidad($usuariounidad[0]->getId());


        $deleteForm = $this->createDeleteForm($id);

        $dql = "select u from SitBundle:Unidad u";
        $query = $em->createQuery($dql);
        $unidad = $query->getResult();


        //reasignado
        $dql = "select r from SitBundle:Reasignado r where r.ticket= :id order by r.id DESC";
        $query = $em->createQuery($dql);
        $query->setParameter('id',$id);
        $query->setMaxResults(1);
        $reasignado = $query->getResult();

        return $this->render('SitBundle:Ticket:show.html.twig', array(
            'entity'      => $ticket,
            'delete_form' => $deleteForm->createView(),
            'datosusuario'=>$datosusuario,
            'unidad'=>$unidad,
            'usuariosunidad'=>$usuariosunidad,
            'usuarioticket'=>$usuarioticket,
            'idunidad'=>$usuariounidad[0]->getId(),
            'reasignado'=>$reasignado
        ));
    }

    /**
     * Displays a form to edit an existing Ticket entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SitBundle:Ticket')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ticket entity.');
        }

        $editForm = $this->createForm(new TicketType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SitBundle:Ticket:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Ticket entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SitBundle:Ticket')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ticket entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TicketType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ticket_edit', array('id' => $id)));
        }

        return $this->render('SitBundle:Ticket:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Ticket entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SitBundle:Ticket')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Ticket entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ticket'));
    }

    /**
     * Creates a form to delete a Ticket entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
