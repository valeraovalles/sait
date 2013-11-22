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

    public function homepagejorAction()
    {
        $em = $this->getDoctrine()->getManager();
        $dql = "select j from MercalBundle:Jornada j where j.fechajornada>= :fechajornada order by j.nombrejornada, j.fechajornada ASC";
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

        //consulto a ver si ya se empezo a guardar la nuemracion en la tabla numeracion
        $dql = "select n from MercalBundle:Numeracion n join n.usernumero un where un.jornada= :jornada order by un.numero DESC";
        $query = $em->createQuery($dql);
        $query->setParameter('jornada', $jornada->getId());
        $query->setMaxResults(1);
        $numeroactual = $query->getResult();
        if(!empty($numeroactual)){
            $numeroactual=$numeroactual[0];

            //json
            if($numeroactual->getUsernumero()->getFamiliar()==null){
                $nomape=$numeroactual->getUsernumero()->getTrabajador()->getPrimerNombre().' '.$numeroactual->getUsernumero()->getTrabajador()->getPrimerApellido();
            }
            else{
                $nomape=$numeroactual->getUsernumero()->getFamiliar()->getNombres().' '.$numeroactual->getUsernumero()->getFamiliar()->getApellidos();
            }

            $json[0]=array(
                'numero'=>$numeroactual->getUsernumero()->getNumero(),
                'nombre'=>strtoupper($nomape)
            );
            $jsonencoded = json_encode($json);
            $fh = fopen("uploads/jornada/".$jornada->getNombrejornada().".json", 'w+');
            fwrite($fh, $jsonencoded);
            fclose($fh);
            //fin json

            $numeracion=$numeroactual->getUsernumero();
            $valor=$numeroactual->getValor();
        }

        else{

            //em esta seccion se supone que no ha empezado la numeracion
            $valor=0;

            //consulto numero del primer trabajador trabajador
            $dql = "select un from MercalBundle:Usernumero un where un.jornada= :jornada order by un.numero ASC";
            $query = $em->createQuery($dql);
            $query->setParameter('jornada', $idjornada);
            $query->setMaxResults(1);
            $query->setFirstResult(0);
            $numeracion = $query->getResult();
            if(!empty($numeracion)){
                $numeracion=$numeracion[0];

                //json
                if($numeracion->getFamiliar()==null){
                    $nomape=$numeracion->getTrabajador()->getPrimerNombre().' '.$numeracion->getTrabajador()->getPrimerApellido();
                }
                else{
                    $nomape=$numeracion->getFamiliar()->getNombres().' '.$numeracion->getFamiliar()->getApellidos();
                }
                $json[0]=array(
                    'numero'=>$numeracion->getNumero(),
                    'nombre'=>strtoupper($nomape)
                );
                $jsonencoded = json_encode($json);
                $fh = fopen("uploads/jornada/".$jornada->getNombrejornada().".json", 'w+');
                fwrite($fh, $jsonencoded);
                fclose($fh);
                //fin json
                    }
            else
                $numeracion=null;
        }

        return $this->render('MercalBundle:Default:homepagenum.html.twig',array('numeracion'=>$numeracion,'jornada'=>$jornada));
    }

    public function jornadanumeracionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $dql = "select j from MercalBundle:Jornada j where j.fechajornada>= :fechajornada order by j.nombrejornada, j.fechajornada ASC";
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

        //consulto a ver si ya se empezo a guardar la nuemracion en la tabla numeracion
        $dql = "select n from MercalBundle:Numeracion n join n.usernumero un where un.jornada= :jornada order by un.numero DESC";
        $query = $em->createQuery($dql);
        $query->setParameter('jornada', $jornada->getId());
        $query->setMaxResults(1);
        $numeroactual = $query->getResult();
        if(!empty($numeroactual)){
            $numeroactual=$numeroactual[0];


            //json
            if($numeroactual->getUsernumero()->getFamiliar()==null){
                $nomape=$numeroactual->getUsernumero()->getTrabajador()->getPrimerNombre().' '.$numeroactual->getUsernumero()->getTrabajador()->getPrimerApellido();
            }
            else{
                $nomape=$numeroactual->getUsernumero()->getFamiliar()->getNombres().' '.$numeroactual->getUsernumero()->getFamiliar()->getApellidos();
            }

            $json[0]=array(
                'numero'=>$numeroactual->getUsernumero()->getNumero(),
                'nombre'=>strtoupper($nomape)
            );
            $jsonencoded = json_encode($json);
            $fh = fopen("uploads/jornada/".$jornada->getNombrejornada().".json", 'w+');
            fwrite($fh, $jsonencoded);
            fclose($fh);
            //fin json

            $numeracion=$numeroactual->getUsernumero();
            $valor=$numeroactual->getValor();
        }

        else{

            //em esta seccion se supone que no ha empezado la numeracion
            $valor=0;
            //consulto numero del primer trabajador trabajador
            $dql = "select un from MercalBundle:Usernumero un where un.jornada= :jornada order by un.numero ASC";
            $query = $em->createQuery($dql);
            $query->setParameter('jornada', $idjornada);
            $query->setMaxResults(1);
            $query->setFirstResult(0);
            $numeracion = $query->getResult();
            if(!empty($numeracion)){
                $numeracion=$numeracion[0];

                //json
                if($numeracion->getFamiliar()==null){
                    $nomape=$numeracion->getTrabajador()->getPrimerNombre().' '.$numeracion->getTrabajador()->getPrimerApellido();
                }
                else{
                    $nomape=$numeracion->getFamiliar()->getNombres().' '.$numeracion->getFamiliar()->getApellidos();
                }
                $json[0]=array(
                    'numero'=>$numeracion->getNumero(),
                    'nombre'=>strtoupper($nomape)
                );
                $jsonencoded = json_encode($json);
                $fh = fopen("uploads/jornada/".$jornada->getNombrejornada().".json", 'w+');
                fwrite($fh, $jsonencoded);
                fclose($fh);
                //fin json
                    }
            else
                $numeracion=null;
        }


        return $this->render('MercalBundle:Default:index.html.twig',array('numeracion'=>$numeracion,'jornada'=>$jornada,'valor'=>$valor));
    }

    public function seleccionajornadaAction()
    {
        $em = $this->getDoctrine()->getManager();
        $dql = "select j from MercalBundle:Jornada j order by j.nombrejornada, j.fechajornada ASC";
        $query = $em->createQuery($dql);
        $jornadas = $query->getResult();

        return $this->render('MercalBundle:Default:seleccionajornada.html.twig',array('jornadas'=>$jornadas));
    }

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
        $numerosasignadostrab = $query->getResult();
        $arraynumeroasignadotrab=array();
        foreach ($numerosasignadostrab as $v) {
            $arraynumeroasignadotrab[$v->getTrabajador()->getId()]=$v->getNumero();
        }  

        //consulto numero de familiar
        $dql = "select un from MercalBundle:Usernumero un where un.jornada= :jornada and un.familiar is not null";
        $query = $em->createQuery($dql);
        $query->setParameter('jornada', $jornada->getId());
        $numerosasignadosfam = $query->getResult();
        $arraynumeroasignadofam=array();
        foreach ($numerosasignadosfam as $v) {
            $arraynumeroasignadofam[$v->getTrabajador()->getId()]=$v->getNumero();
        }  

        return $this->render('MercalBundle:Default:listado.html.twig',array('trabajadores'=>$trabajadores,'arraynumeroasignadotrab'=>$arraynumeroasignadotrab,'arraynumeroasignadofam'=>$arraynumeroasignadofam,'jornada'=>$jornada));
    }

    public function listadofamAction($idtrabajador,$idjornada)
    {

        $em = $this->getDoctrine()->getManager();

        $trabajador =  $em->getRepository('UsuarioBundle:Perfil')->find($idtrabajador);

        $dql = "select f from MercalBundle:Familiar f where f.trabajador= :idtrabajador";
        $query = $em->createQuery($dql);
        $query->setParameter('idtrabajador', $idtrabajador);
        $famtrabajador = $query->getResult();

        $jornada =  $em->getRepository('MercalBundle:Jornada')->find($idjornada);


        //nerifico numeros del familiar
        $dql = "select un from MercalBundle:Usernumero un where un.trabajador= :idtrabajador and un.familiar is not null and un.jornada= :jornada";
        $query = $em->createQuery($dql);
        $query->setParameter('idtrabajador', $idtrabajador);
        $query->setParameter('jornada', $jornada->getId());
        $query ->setMaxResults(1);
        $numerofam = $query->getResult();

        $arraynumerofam=array();
        foreach ($numerofam as $v) {
            $arraynumerofam[$v->getFamiliar()->getId()]=$v->getNumero();
        }

        return $this->render('MercalBundle:Default:listadofam.html.twig',array('trabajador'=>$trabajador,'jornada'=>$jornada,'famtrabajador'=>$famtrabajador,'arraynumerofam'=>$arraynumerofam));
    }

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
        $numerotrabajador = $query->getResult();
        if(empty($numerotrabajador))$numerotrabajador=0;
        else $numerotrabajador=$numerotrabajador[0]->getNumero();

        return $this->render('MercalBundle:Default:asignarnumero.html.twig',array('trabajador'=>$trabajador,'datossf'=>$datossf,'numerotrabajador'=>$numerotrabajador,'jornada'=>$jornada));
    }

    public function guardaasignarnumeroAction($idtrabajador,$idjornada)
    {
        $em = $this->getDoctrine()->getManager();
        $trabajador =  $em->getRepository('UsuarioBundle:Perfil')->find($idtrabajador);

        $jornada =  $em->getRepository('MercalBundle:Jornada')->find($idjornada);

        $f=new Funcion;
        $datossf=$f->datosUsuarioSigefirrhh($trabajador->getCedula());


        $dql = "select un from MercalBundle:Usernumero un order by un.numero DESC";
        $query = $em->createQuery($dql);
        $query ->setMaxResults(1);
        $ultimonumero = $query->getResult();

        if(empty($ultimonumero))$ultimonumero=1;
        else $ultimonumero=$ultimonumero[0]->getNumero()+1;


        $entity=new Usernumero;
        $entity->setTrabajador($trabajador);
        $entity->setNumero($ultimonumero);
        
        $fechahora = date_create_from_format('Y-m-d G:i:s', \date("Y-m-d G:i:s"));
        $entity->setFechahora($fechahora);
        
        
        $entity->setJornada($jornada);
        
        $em->persist($entity);
        $em->flush();

        //CORREO
        $message = \Swift_Message::newInstance()     // we create a new instance of the Swift_Message class
        ->setSubject('Jornada-'.$jornada->getNombrejornada())     // we configure the title
        ->setFrom('aplicaciones@telesurtv.net')     // we configure the sender
        ->setTo(array($trabajador->getUser()->getUsername().'@telesurtv.net'))    // we configure the recipient
        ->setBody("<div align='center'><h1>JORNADA - ".strtoupper($jornada->getNombrejornada())."</h1><br>El número que tienes asignado para la jornada de ".$jornada->getNombrejornada()." es <b>(".$ultimonumero.")</b>. Debes estar atento a la numeración, accediendo a la aplicación de jornadas ubicada en el siguiente link http://www.aplicaciones.telesurtv.net</div>", 'text/html');

        //$this->get('mailer')->send($message);    // then we send the message.
        //FIN CORREO

        $this->get('session')->getFlashBag()->add('notice', 'SE HA ASIGNADO EL NUMERO '.$ultimonumero.' AL TRABAJADOR');
        return $this->redirect($this->generateUrl('mercal_asignarnumero',array('idjornada'=>$jornada->getId(),'idtrabajador'=>$idtrabajador)));
    }


    public function guardaasignarnumerofamAction($idtrabajador,$idfamiliar,$idjornada)
    {
        $em = $this->getDoctrine()->getManager();

        $trabajador =  $em->getRepository('UsuarioBundle:Perfil')->find($idtrabajador);

        $f=new Funcion;
        $datossf=$f->datosUsuarioSigefirrhh($trabajador->getCedula());

        $familiar =  $em->getRepository('MercalBundle:Familiar')->find($idfamiliar);

        $jornada =  $em->getRepository('MercalBundle:Jornada')->find($idjornada);

        //verifico que el familiar no tenga numero asignado y que solo un familiar tenga numero
        $dql = "select un from MercalBundle:Usernumero un where un.trabajador= :idtrabajador and un.familiar is not null and un.jornada= :jornada";
        $query = $em->createQuery($dql);
        $query->setParameter('idtrabajador', $idtrabajador);
        $query->setParameter('jornada', $jornada->getId());
        $query ->setMaxResults(1);
        $numerofam = $query->getResult();

        $arraynumerofam=array();
        foreach ($numerofam as $v) {
            $arraynumerofam[$v->getFamiliar()->getId()]=$v->getNumero();
        }


        if(!empty($numerofam)){
            $this->get('session')->getFlashBag()->add('alert', 'Solo se permite asignar un numero a un falimiar por jornada.');
            return $this->redirect($this->generateUrl('mercal_listadofam',array('idjornada'=>$idjornada,'idtrabajador'=>$idtrabajador,'arraynumerofam'=>$arraynumerofam)));
        }


        //genero el numero a guardar
        $dql = "select un from MercalBundle:Usernumero un order by un.numero DESC";
        $query = $em->createQuery($dql);
        $query ->setMaxResults(1);
        $ultimonumero = $query->getResult();
        if(empty($ultimonumero))$ultimonumero=1;
        else $ultimonumero=$ultimonumero[0]->getNumero()+1;

        $entity=new Usernumero;
        $entity->setFamiliar($familiar);
        $entity->setTrabajador($trabajador);
        $entity->setNumero($ultimonumero);
      
        $fechahora = date_create_from_format('Y-m-d G:i:s', \date("Y-m-d G:i:s"));
        $entity->setFechahora($fechahora);
        $entity->setJornada($jornada);
        
        $em->persist($entity);
        $em->flush();

        //CORREO
        $message = \Swift_Message::newInstance()     // we create a new instance of the Swift_Message class
        ->setSubject('Jornada-'.$jornada->getNombrejornada())     // we configure the title
        ->setFrom('aplicaciones@telesurtv.net')     // we configure the sender
        ->setTo(array($trabajador->getUser()->getUsername().'@telesurtv.net'))    // we configure the recipient
        ->setBody("<div align='center'><h1>JORNADA - ".strtoupper($jornada->getNombrejornada())."</h1><br>El número asignado a tu familiar (".$familiar->getNombres()." ".$familiar->getApellidos().") para la jornada de ".$jornada->getNombrejornada()." es <b>(".$ultimonumero.")</b>. Debes estar atento a la numeración, accediendo a la aplicación de jornadas ubicada en el siguiente link http://www.aplicaciones.telesurtv.net</div>", 'text/html');

        //$this->get('mailer')->send($message);    // then we send the message.
        //FIN CORREO

        $this->get('session')->getFlashBag()->add('notice', 'SE HA ASIGNADO EL NUMERO AL FAMILIAR DEL TRABAJADOR');
         return $this->redirect($this->generateUrl('mercal_listadofam',array('idjornada'=>$idjornada,'idtrabajador'=>$idtrabajador)));

    }

    public function eliminarnumerotrabAction($idtrabajador,$idjornada)
    {
        $em = $this->getDoctrine()->getManager();

        $jornada =  $em->getRepository('MercalBundle:Jornada')->find($idjornada);

        //numero trabajador
        $dql = "select un from MercalBundle:Usernumero un where un.trabajador= :idtrabajador and un.familiar is null and un.jornada= :jornada";
        $query = $em->createQuery($dql);
        $query->setParameter('idtrabajador', $idtrabajador);
        $query->setParameter('jornada', $jornada->getId());
        $query ->setMaxResults(1);
        $entity = $query->getResult();
        $em->remove($entity[0]);
        $em->flush();

        $this->get('session')->getFlashBag()->add('notice', 'El número asignado se ha eliminado correctamente.');
        return $this->redirect($this->generateUrl('mercal_asignarnumero',array('idjornada'=>$idjornada,'idtrabajador'=>$idtrabajador)));
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
        $entity = $query->getResult();
        $em->remove($entity[0]);
        $em->flush();

        $this->get('session')->getFlashBag()->add('notice', 'El número asignado se ha eliminado correctamente.');
        return $this->redirect($this->generateUrl('mercal_listadofam',array('idjornada'=>$idjornada,'idtrabajador'=>$idtrabajador)));
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

        $entity =  $em->getRepository('MercalBundle:Familiar')->find($idfamiliar);

        $em->remove($entity);
        $em->flush();

        $this->get('session')->getFlashBag()->add('notice', 'El familiar se eliminó exitosamente.');
        return $this->redirect($this->generateUrl('mercal_listadofam',array('idjornada'=>$idjornada,'idtrabajador'=>$idtrabajador)));

        //numero trabajador
        $dql = "select un from MercalBundle:Usernumero un where un.trabajador= :idtrabajador and un.familiar= :idfamiliar and un.jornada= :jornada";
        $query = $em->createQuery($dql);
        $query->setParameter('idtrabajador', $idtrabajador);
        $query->setParameter('idfamiliar', $idfamiliar);
        $query->setParameter('jornada', $jornada->getId());
        $query ->setMaxResults(1);
        $entity = $query->getResult();
        $em->remove($entity[0]);
        $em->flush();

        $this->get('session')->getFlashBag()->add('notice', 'El número asignado se ha eliminado correctamente.');
        return $this->redirect($this->generateUrl('mercal_listadofam',array('idjornada'=>$idjornada,'idtrabajador'=>$idtrabajador)));
    }
}