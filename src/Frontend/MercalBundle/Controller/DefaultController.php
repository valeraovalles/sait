<?php

namespace Frontend\MercalBundle\Controller;
use Symfony\Component\HttpFoundation\Request;

use Administracion\UsuarioBundle\Entity\Perfil;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Administracion\UsuarioBundle\Resources\Misclases\Funcion;
use Frontend\MercalBundle\Entity\Usernumero;
use Frontend\MercalBundle\Entity\Familiar;
use Frontend\MercalBundle\Form\FamiliarType;



class DefaultController extends Controller
{
    //revisado
    public function seleccionajornadaAction()
    {
        $em = $this->getDoctrine()->getManager();
        $dql = "select j from MercalBundle:Jornada j where j.fechajornada>= :fechajornada and j.culminada=false order by j.nombrejornada, j.fechajornada ASC";
        $query = $em->createQuery($dql);
        $query->setParameter('fechajornada', \date("Y-m-d"));
        $jornadas = $query->getResult();

        return $this->render('MercalBundle:Default:seleccionajornada.html.twig',array('jornadas'=>$jornadas));
    }

    //revisado falta validar los numeros asignados
    public function listadoAction($idjornada)
    {
        //consulto trabajadores activos
        $em = $this->getDoctrine()->getManager();
        $dql = "select p from UsuarioBundle:Perfil p join p.user u where u.isActive=true";
        $query = $em->createQuery($dql);
        $trabajadores = $query->getResult();

        //consulto jornada
        $jornada =  $em->getRepository('MercalBundle:Jornada')->find($idjornada);

        //consulto numero de trabajador
        $dql = "select un from MercalBundle:Usernumero un where un.jornada= :jornada and un.familiar is null";
        $query = $em->createQuery($dql);
        $query->setParameter('jornada', $jornada->getId());
        $usernumerotrab = $query->getResult();
        $numeroasignadotrab=array();
        foreach ($usernumerotrab as $v) {
            $numeroasignadotrab[$v->getTrabajador()->getId()]=$v;
        }  

        //consulto numero de familiar
        $dql = "select un from MercalBundle:Usernumero un where un.jornada= :jornada and un.familiar is not null";
        $query = $em->createQuery($dql);
        $query->setParameter('jornada', $jornada->getId());
        $usernumerofam = $query->getResult();
        $numeroasignadofam=array();
        foreach ($usernumerofam as $v) {
            $numeroasignadofam[$v->getTrabajador()->getId()]=$v;
        }  

        return $this->render('MercalBundle:Default:listado.html.twig',array('trabajadores'=>$trabajadores,'numeroasignadotrab'=>$numeroasignadotrab,'numeroasignadofam'=>$numeroasignadofam,'jornada'=>$jornada));
    }

    //revisado
    public function asignarnumeroAction($idtrabajador,$idjornada)
    {
        $em = $this->getDoctrine()->getManager();

        $trabajador =  $em->getRepository('UsuarioBundle:Perfil')->find($idtrabajador);

        $f=new Funcion;
        $datossf=$f->datosUsuarioSigefirrhh($trabajador->getCedula());

        $jornada =  $em->getRepository('MercalBundle:Jornada')->find($idjornada);

        //numero trabajador
        $dql = "select un from MercalBundle:Usernumero un where un.trabajador= :idtrabajador and un.familiar is null and un.jornada= :jornada order by un.numero DESC";
        $query = $em->createQuery($dql);
        $query->setParameter('idtrabajador', $idtrabajador);
        $query->setParameter('jornada', $jornada->getId());
        $query ->setMaxResults(1);
        $usernumero = $query->getResult();

        return $this->render('MercalBundle:Default:asignarnumero.html.twig',array('trabajador'=>$trabajador,'datossf'=>$datossf,'usernumero'=>$usernumero,'jornada'=>$jornada));
    }

    //revisado
    public function guardaasignarnumeroAction($idtrabajador,$idjornada)
    {
        $em = $this->getDoctrine()->getManager();
        $trabajador =  $em->getRepository('UsuarioBundle:Perfil')->find($idtrabajador);

        $jornada =  $em->getRepository('MercalBundle:Jornada')->find($idjornada);

        //$f=new Funcion;
        //$datossf=$f->datosUsuarioSigefirrhh($trabajador->getCedula());

        //consulto para generar el numero que sigue en cola
        $dql = "select un from MercalBundle:Usernumero un order by un.numero DESC";
        $query = $em->createQuery($dql);
        $query ->setMaxResults(1);
        $ultimonumero = $query->getResult();
        if(empty($ultimonumero))$ultimonumero=1;
        else $ultimonumero=$ultimonumero[0]->getNumero()+1;

        //guardo el numero asignado al trabajdor
        $entity=new Usernumero;
        $entity->setTrabajador($trabajador);
        $entity->setNumero($ultimonumero);
        $fechahora = date_create_from_format('Y-m-d G:i:s', \date("Y-m-d G:i:s"));
        $entity->setFechahoraasignacion($fechahora);
        $entity->setJornada($jornada);
        $em->persist($entity);
        $em->flush();

        //CORREO
            $message = \Swift_Message::newInstance()     
            ->setSubject('Jornada-'.$jornada->getNombrejornada())   
            ->setFrom('aplicaciones@telesurtv.net')    
            ->setTo(array($trabajador->getUser()->getUsername().'@telesurtv.net'))  
            ->setBody("<div align='center'><h1>JORNADA - ".strtoupper($jornada->getNombrejornada())."</h1><br>El número que tienes asignado para la jornada de ".$jornada->getNombrejornada()." es <b>(".$ultimonumero.")</b>. Debes estar atento a la numeración, accediendo a la aplicación de jornadas ubicada en el siguiente link http://www.aplicaciones.telesurtv.net</div>", 'text/html');
            //$this->get('mailer')->send($message);    
        //FIN CORREO

        $this->get('session')->getFlashBag()->add('notice', 'SE HA ASIGNADO EL NUMERO '.$ultimonumero.' AL TRABAJADOR');
        return $this->redirect($this->generateUrl('mercal_asignarnumero',array('idjornada'=>$jornada->getId(),'idtrabajador'=>$idtrabajador)));
    }

    //funcion para actualizar el json al ultimo registro no numerado
    public function actualizajson($jornada){
        //actualizo json con ultimo registro si este existe
        $em = $this->getDoctrine()->getManager();
        $dql = "select u from MercalBundle:Usernumero u where u.fechahoranumeracion is null and u.compro is null and u.jornada= :idjornada order by u.id ASC";
        $query = $em->createQuery($dql);
        $query->setParameter('idjornada', $jornada->getId());
        $query ->setMaxResults(1);
        $usernumero = $query->getResult();

        if(!empty($usernumero)){

            $usernumero=$usernumero[0];
            //json
            if($usernumero->getFamiliar()==null){
                $nomape=$usernumero->getTrabajador()->getPrimerNombre().' '.$usernumero->getTrabajador()->getPrimerApellido();
                $cedula=$usernumero->getTrabajador()->getCedula();
                $tipo="t";
            }
            else{
                $nomape="FAM: ".$usernumero->getFamiliar()->getNombres().' '.$usernumero->getFamiliar()->getApellidos();
                $cedula=$usernumero->getFamiliar()->getCedula();
                $tipo="f";
            }

            $json[0]=array(
                'usernumeroid'=>$usernumero->getId(),
                'numero'=>$usernumero->getNumero(),
                'nombre'=>strtoupper($nomape),
                'cedula'=>'C.I. '.strtoupper($cedula),
                'tipo'=>$tipo,
                'compro'=>$usernumero->getCompro()
            );
        }else{

            $dql = "select u from MercalBundle:Usernumero u where u.jornada= :idjornada order by u.id DESC";
            $query = $em->createQuery($dql);
            $query->setParameter('idjornada', $jornada->getId());
            $query ->setMaxResults(1);
            $usernumero = $query->getResult();

            if(empty($usernumero)){
                $json[0]=array(
                    'usernumeroid'=>0,
                    'numero'=>0,
                    'nombre'=>'PRONTO COMENZARÁ',
                    'cedula'=>'',
                    'tipo'=>0,
                    'compro'=>'fin'
                );
            }else if ($usernumero[0]->getJornada()->getCulminada()==false){
                $json[0]=array(
                    'usernumeroid'=>0,
                    'numero'=>$usernumero[0]->getNumero(),
                    'nombre'=>'COLA EN ESPERA',
                    'cedula'=>'',
                    'tipo'=>0,
                    'compro'=>'verificar'
                );                
            }
            else if ($usernumero[0]->getJornada()->getCulminada()==true){
                $json[0]=array(
                    'usernumeroid'=>0,
                    'numero'=>0,
                    'nombre'=>'CULMINADA',
                    'cedula'=>'',
                    'tipo'=>0,
                    'compro'=>'fin'
                );                
            }
        }

        $jsonencoded = json_encode($json);
        $fh = fopen("uploads/jornada/".$jornada->getNombrejornada().$jornada->getFechajornada()->format("dmY").".json", 'w+');
        fwrite($fh, $jsonencoded);
        fclose($fh);
        return;
    }

    public function eliminarnumerotrabAction($idtrabajador,$idjornada)
    {
        $em = $this->getDoctrine()->getManager();

        $jornada =  $em->getRepository('MercalBundle:Jornada')->find($idjornada);

        //elimino de la tabla usernumero
        $dql = "select un from MercalBundle:Usernumero un where un.trabajador= :idtrabajador and un.familiar is null and un.jornada= :jornada";
        $query = $em->createQuery($dql);
        $query->setParameter('idtrabajador', $idtrabajador);
        $query->setParameter('jornada', $jornada->getId());
        $query ->setMaxResults(1);
        $usernumero = $query->getResult();
        $em->remove($usernumero[0]);
        $em->flush();

        $this->actualizajson($jornada);

        $this->get('session')->getFlashBag()->add('notice', 'El número asignado se ha eliminado correctamente.');
        return $this->redirect($this->generateUrl('mercal_asignarnumero',array('idjornada'=>$idjornada,'idtrabajador'=>$idtrabajador)));       
    }

    //revisado
    public function jornadanumeracionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $dql = "select j from MercalBundle:Jornada j where j.fechajornada>= :fechajornada and j.culminada=false order by j.nombrejornada, j.fechajornada ASC";
        $query = $em->createQuery($dql);
        $query->setParameter('fechajornada', \date("Y-m-d"));
        $jornadas = $query->getResult();

        return $this->render('MercalBundle:Default:jornadanumeracion.html.twig',array('jornadas'=>$jornadas));
    }


    public function indexAction($idjornada)
    {
        $em = $this->getDoctrine()->getManager();

        //consulto jornada
        $jornada =  $em->getRepository('MercalBundle:Jornada')->find($idjornada);

        $this->actualizajson($jornada);

        if (file_exists("uploads/jornada/".$jornada->getNombrejornada().$jornada->getFechajornada()->format("dmY").".json")) {
            $str_datos = file_get_contents("uploads/jornada/".$jornada->getNombrejornada().$jornada->getFechajornada()->format("dmY").".json");
            $datos = json_decode($str_datos,true);
            $datos=$datos[0];

        } 
        else $datos=null;

        return $this->render('MercalBundle:Default:index.html.twig',array('datos'=>$datos,'jornada'=>$jornada));
    }



    public function listadofamAction($idtrabajador,$idjornada)
    {

        $em = $this->getDoctrine()->getManager();
        $jornada =  $em->getRepository('MercalBundle:Jornada')->find($idjornada);

        $trabajador =  $em->getRepository('UsuarioBundle:Perfil')->find($idtrabajador);

        $dql = "select f from MercalBundle:Familiar f where f.trabajador= :idtrabajador";
        $query = $em->createQuery($dql);
        $query->setParameter('idtrabajador', $idtrabajador);
        $famtrabajador = $query->getResult();

        //verifico numeros del familiar
        $dql = "select un from MercalBundle:Usernumero un where un.trabajador= :idtrabajador and un.familiar is not null and un.jornada= :jornada";
        $query = $em->createQuery($dql);
        $query->setParameter('idtrabajador', $idtrabajador);
        $query->setParameter('jornada', $jornada->getId());
        $query ->setMaxResults(1);
        $usernumero = $query->getResult();
        $arraynumerofam=array();
        foreach ($usernumero as $v) {
            $arraynumerofam[$v->getFamiliar()->getId()]=$v;
        }


        return $this->render('MercalBundle:Default:listadofam.html.twig',array('trabajador'=>$trabajador,'jornada'=>$jornada,'famtrabajador'=>$famtrabajador,'arraynumerofam'=>$arraynumerofam));
    }

    //revisado
    public function guardaasignarnumerofamAction($idtrabajador,$idfamiliar,$idjornada)
    {
        $em = $this->getDoctrine()->getManager();
        $trabajador =  $em->getRepository('UsuarioBundle:Perfil')->find($idtrabajador);
        $familiar =  $em->getRepository('MercalBundle:Familiar')->find($idfamiliar);
        $jornada =  $em->getRepository('MercalBundle:Jornada')->find($idjornada);

        //verifico  que solo un familiar tenga numero
        $dql = "select un from MercalBundle:Usernumero un where un.trabajador= :idtrabajador and un.familiar is not null and un.jornada= :jornada";
        $query = $em->createQuery($dql);
        $query->setParameter('idtrabajador', $idtrabajador);
        $query->setParameter('jornada', $jornada->getId());
        $query ->setMaxResults(1);
        $numerofam = $query->getResult();
        if(!empty($numerofam)){
            $this->get('session')->getFlashBag()->add('alert', 'Solo se permite asignar un numero a un falimiar por jornada.');
            return $this->redirect($this->generateUrl('mercal_listadofam',array('idjornada'=>$idjornada,'idtrabajador'=>$idtrabajador)));
        }


        //consulto para generar el numero que sigue en cola
        $dql = "select un from MercalBundle:Usernumero un order by un.numero DESC";
        $query = $em->createQuery($dql);
        $query ->setMaxResults(1);
        $ultimonumero = $query->getResult();
        if(empty($ultimonumero))$ultimonumero=1;
        else $ultimonumero=$ultimonumero[0]->getNumero()+1;

        //guardo el numero asignado al trabajdor
        $entity=new Usernumero;
        $entity->setTrabajador($trabajador);
        $entity->setFamiliar($familiar);
        $entity->setNumero($ultimonumero);
        $fechahora = date_create_from_format('Y-m-d G:i:s', \date("Y-m-d G:i:s"));
        $entity->setFechahoraasignacion($fechahora);
        $entity->setJornada($jornada);
        $em->persist($entity);
        $em->flush();


        $this->get('session')->getFlashBag()->add('notice', 'SE HA ASIGNADO EL NUMERO AL FAMILIAR DEL TRABAJADOR');
         return $this->redirect($this->generateUrl('mercal_listadofam',array('idjornada'=>$idjornada,'idtrabajador'=>$idtrabajador)));

    }

    public function eliminarnumerofamAction($idtrabajador,$idfamiliar,$idjornada)
    {
        $em = $this->getDoctrine()->getManager();

        $jornada =  $em->getRepository('MercalBundle:Jornada')->find($idjornada);

        //numero trabajador
        $dql = "select un from MercalBundle:Usernumero un where un.trabajador= :idtrabajador and un.familiar= :idfamiliar and un.jornada= :jornada";
        $query = $em->createQuery($dql);
        $query->setParameter('idtrabajador', $idtrabajador);
        $query->setParameter('idfamiliar', $idfamiliar);
        $query->setParameter('jornada', $jornada->getId());
        $query ->setMaxResults(1);
        $usernumero = $query->getResult();
        $em->remove($usernumero[0]);
        $em->flush();

        $this->actualizajson($jornada);

        $this->get('session')->getFlashBag()->add('notice', 'El número asignado se ha eliminado correctamente.');
        return $this->redirect($this->generateUrl('mercal_listadofam',array('idjornada'=>$idjornada,'idtrabajador'=>$idtrabajador)));       
    }

    //
    public function homepagejorAction()
    {
        $em = $this->getDoctrine()->getManager();
        $dql = "select j from MercalBundle:Jornada j where j.fechajornada>= :fechajornada and j.culminada=false order by j.nombrejornada, j.fechajornada ASC";
        $query = $em->createQuery($dql);
        $query->setParameter('fechajornada', \date("Y-m-d"));
        $jornadas = $query->getResult();

        return $this->render('MercalBundle:Default:homepagejor.html.twig',array('jornadas'=>$jornadas));
    }

    public function homepagenumAction($idjornada)
    {
        $em = $this->getDoctrine()->getManager();

        //consulto jornada
        $jornada =  $em->getRepository('MercalBundle:Jornada')->find($idjornada);

        $this->actualizajson($jornada);

        if (file_exists("uploads/jornada/".$jornada->getNombrejornada().$jornada->getFechajornada()->format("dmY").".json")) {
            $str_datos = file_get_contents("uploads/jornada/".$jornada->getNombrejornada().$jornada->getFechajornada()->format("dmY").".json");
            $datos = json_decode($str_datos,true);
            $datos=$datos[0];

        } 
        else $datos=null;

        return $this->render('MercalBundle:Default:homepagenum.html.twig',array('datos'=>$datos,'jornada'=>$jornada));
    }









    



    




   public function nuevofamAction($idtrabajador,$idjornada)
    {
        $em = $this->getDoctrine()->getManager();
        $trabajador =  $em->getRepository('UsuarioBundle:Perfil')->find($idtrabajador);

        $entity = new Familiar;
        $form   = $this->createForm(new FamiliarType(), $entity);

        $jornada =  $em->getRepository('MercalBundle:Jornada')->find($idjornada);


        return $this->render('MercalBundle:Default:nuevofam.html.twig',array('form'=> $form->createView(),'trabajador'=>$trabajador,'jornada'=>$jornada));
    }

   public function guardanuevofamAction(Request $request, $idtrabajador,$idjornada)
    {
        $em = $this->getDoctrine()->getManager();
        $trabajador =  $em->getRepository('UsuarioBundle:Perfil')->find($idtrabajador);


        $entity = new Familiar;
        $form   = $this->createForm(new FamiliarType(), $entity);
        $form->bind($request);

        $jornada =  $em->getRepository('MercalBundle:Jornada')->find($idjornada);

        if ($form->isValid()) {

            $entity->setTrabajador($trabajador);
            $em->persist($entity);
            $em->flush();


            $this->get('session')->getFlashBag()->add('notice', 'SE HA GUARDADO EL FAMILIAR EXITOSAMENTE');
            return $this->redirect($this->generateUrl('mercal_listadofam',array('idjornada'=>$idjornada,'idtrabajador'=>$idtrabajador)));

        }

        return $this->render('MercalBundle:Default:nuevofam.html.twig',array('form'=> $form->createView(),'trabajador'=>$trabajador,'jornada'=>$jornada));
    }


   public function editarfamAction($idfamiliar,$idjornada)
    {
        $em = $this->getDoctrine()->getManager();
        $entity =  $em->getRepository('MercalBundle:Familiar')->find($idfamiliar);
        $editForm = $this->createForm(new FamiliarType(), $entity);
        $deleteForm = $this->createDeleteForm($idfamiliar);

        return $this->render('MercalBundle:Default:editarfam.html.twig', array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'idjornada'=>$idjornada
        ));

    }

    public function actualizaeditarfamAction(Request $request, $idfamiliar,$idjornada)
    {
        $em = $this->getDoctrine()->getManager();
        $entity =  $em->getRepository('MercalBundle:Familiar')->find($idfamiliar);
        $editForm = $this->createForm(new FamiliarType(), $entity);
        $editForm->bind($request);
        $deleteForm = $this->createDeleteForm($idfamiliar);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('notice', 'Se ha editado el familiar exitosamente.');

            return $this->redirect($this->generateUrl('mercal_listadofam',array('idjornada'=>$idjornada,'idtrabajador'=>$entity->getTrabajador()->getId())));
        }

        return $this->render('MercalBundle:Default:editarfam.html.twig', array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'idjornada'=>$idjornada
        ));

    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }


    public function borrarfamAction($idtrabajador,$idfamiliar,$idjornada)
    {
        $em = $this->getDoctrine()->getManager();

        //numero trabajador
        $dql = "select un from MercalBundle:Usernumero un where un.trabajador= :idtrabajador and un.familiar= :idfamiliar";
        $query = $em->createQuery($dql);
        $query->setParameter('idtrabajador', $idtrabajador);
        $query->setParameter('idfamiliar', $idfamiliar);
        $query ->setMaxResults(1);
        $entity = $query->getResult();
        if(!empty($entity)){
            $this->get('session')->getFlashBag()->add('alert', 'El familiar no se puede eliminar porque tiene números asignados.');
            return $this->redirect($this->generateUrl('mercal_editarfam',array('idjornada'=>$idjornada,'idfamiliar'=>$idfamiliar)));
        }


        $entity =  $em->getRepository('MercalBundle:Familiar')->find($idfamiliar);

        $em->remove($entity);
        $em->flush();

        $this->get('session')->getFlashBag()->add('notice', 'El familiar se eliminó exitosamente.');
        return $this->redirect($this->generateUrl('mercal_listadofam',array('idjornada'=>$idjornada,'idtrabajador'=>$idtrabajador)));
    }
}