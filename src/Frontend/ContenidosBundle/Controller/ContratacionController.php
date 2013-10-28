<?php

namespace Frontend\ContenidosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

//ASOCIO LAS ENTIDADES QUE SE UTILIZARAN
use Frontend\ContenidosBundle\Entity\Contratacion;
use Frontend\ContenidosBundle\Entity\Presupuesto;
use Frontend\ContenidosBundle\Entity\Datosproveedor;

//ASOCIO LOS FORMULARIOS QUE SE UTILIZARAN
use Frontend\ContenidosBundle\Form\ContratacionType;


/*
*
* CONTROLADOR DE LAS CONTRATACIONES
*
*/
class ContratacionController extends Controller
{
    /*
    *
    * LISTA DE TODAS LAS CONTRATACIONES ASOCIADAS A UN PRESUPUESTO
    *
    */
    public function indexAction($id_presupuesto,$id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();
       
        //obtengo los datos del presupuesto segun el id
        $presupuesto = $em->getRepository('ContenidosBundle:Presupuesto')->findByDescripcion($id_presupuesto);

        //obtengo los datos de la contratacion segun id
        $entities = $em->getRepository('ContenidosBundle:Contratacion')->findByidPresupuesto($id_presupuesto);

        //envío a la vista
        return $this->render('ContenidosBundle:Contratacion:index.html.twig', array(
            'entities'          => $entities,
            'id_presupuesto'    => $id_presupuesto,
            'id_proveedor'      => $id_proveedor,
            'pres'              => $presupuesto,
        ));
    }

    /*
    *
    * FUNCION PARA CREAR UNA CONTRATACION
    *
    */
    public function createAction(Request $request,$id_presupuesto,$id_proveedor)
    {


        $em = $this->getDoctrine()->getManager();

        //instancio la clase
        $entity  = new Contratacion();

        //asocio al formulario la entidad 
        $form = $this->createForm(new ContratacionType(), $entity);
        
        // obtengo los datos que envio el usuario
        $form->bind($request);

        //obtengo la disponibilidad en bs del preseupuesto seleccionado
        $presupuesto = $em->getRepository('ContenidosBundle:Presupuesto')->find($id_presupuesto);
        $disponibilidad = $presupuesto->getDisponibilidad();
        
        //DETERMINO EL TIPO DE MONEDA
        $dolares = $presupuesto->getMontoDolares();
        $euros = $presupuesto->getMontoEuros();

        if (($dolares == 0 || $dolares== NULL) && ($euros != 0 || $euros!=NULL))
        {
            $tipomoneda= '2';//moneda es EUROS
        }elseif(($euros == 0 || $euros==NULL) && (($dolares != 0 || $dolares!= NULL)))
        {
            $tipomoneda = '1';//moneda es DOLARES
        }elseif(($dolares == 0 || $dolares== NULL) && ($euros == 0 || $euros==NULL))
        {
            $tipomoneda = '3'; //moneda es Bs
        }

        //obtengo el signo de la disponibilidad (TRUE si es negativo)
        $signo_act = $presupuesto->getSigno();

        //obtengo el monto de la disponibilidad
        $monto=$entity->getMontoBs();

        //segun el signo determino la disponibilidad
        if ($signo_act == TRUE)
        {
            $disponibilidad = $monto - $disponibilidad;
        }else
        {
            $disponibilidad = $disponibilidad - $monto;
        }

        $signo = FALSE;

        $alert = 0;
        if($disponibilidad < 0)
        {
            $alert= 1;
            $signo = TRUE;
            $disponibilidad = -1 * $disponibilidad;
        }
    
         //obtengo el tipo de proveedor del proveedor de acuerdo a un ID
        $entity1 = $em->getRepository('ContenidosBundle:Datosproveedor')->find($id_proveedor);
        $tipoprov= $entity1->getIdTipoprov();

        //verifico el formulario
        if ($form->isValid()) 
        {
            
            //seteo la disponibilidad, el signo en la variable presupuesto
            $presupuesto->setDisponibilidad($disponibilidad);
            $presupuesto->setSigno($signo);

            //seteo el id del presupuesto y el tipo de moneda en la variable $entity
            $entity->setIdPresupuesto($presupuesto);
            $entity->setTipoMoneda($tipomoneda);

            //inserto las variables $entity y $presupuesto en la BD
            $em->persist($entity);
            $em->persist($presupuesto);
            $em->flush();

            if ($alert == 0)
            {
                //envio a notificacion de que el registro fue creado
                $this->get('session')->getFlashBag()->add('notice', 'SE REGISTRO EXITOSAMENTE LA CONTRATACION');
            }elseif ($alert == 1)
            {
                //envio a notificacion de que el registro fue creado
                $this->get('session')->getFlashBag()->add('alert', 'SE REGISTRO EXITOSAMENTE LA CONTRATACION PERO NO EXISTE DISPONIBILIDAD PRESUPUESTARIA');
            }
            //envio a la vista
            return $this->redirect($this->generateUrl('contratacion_show', array(
                                                                    'id'            => $entity->getId(),
                                                                    'id_proveedor'  => $id_proveedor,
                                                                    'id_presupuesto'=>$id_presupuesto
                                                                    )));
        }
        
        //envio a otra vista si el form no es válido
        return $this->render('ContenidosBundle:Contratacion:new.html.twig', array(
                                                                    'id'            => $entity->getId(),
                                                                    'id_proveedor'  => $id_proveedor,
                                                                    'id_presupuesto'=>$id_presupuesto,
                                                                    'form'          =>$form->createView(),
                                                                    'entity'        => $entity,
                                                                    'tipoprov'      => $tipoprov,
                                                                    'tipomoneda'    => $tipomoneda,
                                                                    'dolares'       => $dolares,
                                                                    'euros'         => $euros,
                                                                    ));
    }

    /*
    *
    * FORMULARIO PARA CREAR UNA CONTRATACION.
    *
    */
    public function newAction($id_presupuesto,$id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();

        //obtengo el id del proveedor segun el presupuesto
        $entity2 = $em->getRepository('ContenidosBundle:Presupuesto')->find($id_presupuesto);
        $prov = $entity2-> getIdProveedor();


        //DETERMINO EL TIPO DE MONEDA (DOLARES O EUROS)
        $dolares = $entity2->getMontoDolares();
        $euros = $entity2->getMontoEuros();
        
        if (($dolares == 0 || $dolares== NULL) && ($euros != 0 || $euros!=NULL))
        {
            $tipomoneda= '2';//moneda es EUROS
        }elseif(($euros == 0 || $euros==NULL) && (($dolares != 0 || $dolares!= NULL)))
        {
            $tipomoneda = '1';//moneda es DOLARES
        }elseif(($dolares == 0 || $dolares== NULL) && ($euros == 0 || $euros==NULL))
        {
            $tipomoneda = '3'; //moneda es Bs
        }


        //instancio la clase Contratacion
        $entity = new Contratacion();

        //asocio la clase al formulario
        $form   = $this->createForm(new ContratacionType(), $entity);

        //obtengo el tipo de proveedor del proveedor de acuerdo a un ID
        $entity1 = $em->getRepository('ContenidosBundle:Datosproveedor')->find($id_proveedor);
        $tipoprov= $entity1->getIdTipoprov();

        //envio a la vista
        return $this->render('ContenidosBundle:Contratacion:new.html.twig', array(
            'entity'        => $entity,
            'id_proveedor'  => $id_proveedor,
            'tipoprov'      => $tipoprov,
            'tipomoneda'    => $tipomoneda,
            'id_presupuesto'=> $id_presupuesto,
            'form'          => $form->createView(),
        ));

    }

    /*
    *
    * DETALLES DE UNA CONTRATACION
    *
    */
    public function showAction($id_presupuesto,$id, $id_proveedor)
    {
        
        $em = $this->getDoctrine()->getManager();

        //obtengo el id del presupuesto desde la contratacion
        $entity1 = $em->getRepository('ContenidosBundle:Contratacion')->find($id);
        $pres= $entity1->getIdPresupuesto();

        //obtengo el id del proveedor segun el presupuesto
        $entity2 = $em->getRepository('ContenidosBundle:Presupuesto')->find($pres);
        $prov = $entity2-> getIdProveedor();


        //DETERMINO EL TIPO DE MONEDA (DOLARES O EUROS)
        $dolares = $entity2->getMontoDolares();
        $euros = $entity2->getMontoEuros();
        
        if (($dolares == 0 || $dolares== NULL) && ($euros != 0 || $euros!=NULL))
        {
            $tipomoneda= '2';//moneda es EUROS
        }elseif(($euros == 0 || $euros==NULL) && (($dolares != 0 || $dolares!= NULL)))
        {
            $tipomoneda = '1';//moneda es DOLARES
        }elseif(($dolares == 0 || $dolares== NULL) && ($euros == 0 || $euros==NULL))
        {
            $tipomoneda = '3'; //moneda es Bs
        }


        //obtengo el id del tipo de proveedor segun el proveedor
        $entity3 = $em->getRepository('ContenidosBundle:Datosproveedor')->find($prov);
        $tipoprov= $entity3->getIdTipoprov();


        //obtengo todos los datos de una contratacion segun ID
        $entity = $em->getRepository('ContenidosBundle:Contratacion')->find($id);


        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contratacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        //envio a la vista
        return $this->render('ContenidosBundle:Contratacion:show.html.twig', array(
            'entity'            => $entity,
            'id_presupuesto'    => $id_presupuesto,
            'id_proveedor'      => $id_proveedor,
            'prov'              => $prov,
            'tipomoneda'        => $tipomoneda,
            'delete_form'       => $deleteForm->createView(),  ));
    }

    /*
    *
    * FORMULARIO PARA EDITAR UNA CONTRATACION
    *
    */
    public function editAction($id,$id_presupuesto,$id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();

        //obtengo el id del presupuesto desde la contratación       
        $entity = $em->getRepository('ContenidosBundle:Contratacion')->find($id);
        $pres= $entity->getIdPresupuesto();

        //obtengo el id del proveedor desde el presupuesto
        $entity2 = $em->getRepository('ContenidosBundle:Presupuesto')->find($pres);
        $prov = $entity2-> getIdProveedor();

        //DETERMINO EL TIPO DE MONEDA (DOLARES O EUROS)
        $dolares = $entity2->getMontoDolares();
        $euros = $entity2->getMontoEuros();
        
        if (($dolares == 0 || $dolares== NULL) && ($euros != 0 || $euros!=NULL))
        {
            $tipomoneda= '2';//moneda es EUROS
        }elseif(($euros == 0 || $euros==NULL) && (($dolares != 0 || $dolares!= NULL)))
        {
            $tipomoneda = '1';//moneda es DOLARES
        }elseif(($dolares == 0 || $dolares== NULL) && ($euros == 0 || $euros==NULL))
        {
            $tipomoneda = '3'; //moneda es Bs
        }


        //obtengo el id del tipo del proveedor desde los datos del proveedor
        $entity3 = $em->getRepository('ContenidosBundle:Datosproveedor')->find($prov);
        $tipoprov= $entity3->getIdTipoprov();

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contratacion entity.');
        }

        //asocio la clase al formulario
        $editForm = $this->createForm(new ContratacionType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        //envio a la vista
        return $this->render('ContenidosBundle:Contratacion:edit.html.twig', array(
            'entity'        => $entity,
            'tipoprov'      => $tipoprov,
            'prov'          => $prov,
            'pres'          => $pres,
            'id_proveedor'  => $id_proveedor,
            'id_presupuesto'=> $id_presupuesto,
            'tipomoneda'    => $tipomoneda,
            'edit_form'     => $editForm->createView(),
            'delete_form'   => $deleteForm->createView(),
        ));
    }

    /*
    *
    * ACTUALIZAR LA CONTRATACION.
    *
    */
    public function updateAction(Request $request, $id, $id_presupuesto,$id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();

        //obtengo datos de la contratacion
        $entity = $em->getRepository('ContenidosBundle:Contratacion')->find($id);
        $pres= $entity->getIdPresupuesto();

        //obtengo datos del presupuesto
        $presupuesto = $em->getRepository('ContenidosBundle:Presupuesto')->find($pres);
        $prov = $presupuesto-> getIdProveedor();

        //obtengo el id del tipo del proveedor desde los datos del proveedor
        $entity3 = $em->getRepository('ContenidosBundle:Datosproveedor')->find($prov);
        $tipoprov= $entity3->getIdTipoprov();



        //DETERMINO EL TIPO DE MONEDA (DOLARES O EUROS)
        $dolares = $presupuesto->getMontoDolares();
        $euros = $presupuesto->getMontoEuros();
        
        if (($dolares == 0 || $dolares== NULL) && ($euros != 0 || $euros!=NULL))
        {
            $tipomoneda= '2';//moneda es EUROS
        }elseif(($euros == 0 || $euros==NULL) && (($dolares != 0 || $dolares!= NULL)))
        {
            $tipomoneda = '1';//moneda es DOLARES
        }elseif(($dolares == 0 || $dolares== NULL) && ($euros == 0 || $euros==NULL))
        {
            $tipomoneda = '3'; //moneda es Bs
        }

        //OBTENGO LA DISPONIBILIDAD Y EL MONTO ANTERIOR
        $disp_ant = $presupuesto->getDisponibilidad();
        $monto_ant = $entity->getMontoBs();

        $disp_act = $disp_ant - $monto_ant;

        //DETERMINO EL SIGNO Y LA DISPONIBILIDAD ACTUAL
        $signo = FALSE;
        if ($disp_act < 0)
        {
            $disp_act = $disp_act * -1;
            $signo = TRUE;
        }
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contratacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ContratacionType(), $entity);
        $editForm->bind($request);

        //OBTENGO EL MONTO ACTUAL
        $monto_desp= $entity->getMontoBs();

        //verifico el formulario
        if ($editForm->isValid())
        {
            //seteo el id del presupuesto
            $entity-> setIdPresupuesto($presupuesto);
            if($monto_desp!=$monto_ant)
            {
                //seteo el signo y la disponibilidad actual
                $presupuesto->setSigno($signo);
                $presupuesto->setDisponibilidad($disp_act);
            }
            //seteo el tipo de moneda (DOLARES O EUROS)
            $entity->setTipoMoneda($tipomoneda);

            //inserto en la BD
            $em->persist($entity);
            $em->flush();

            //envio a notificacion de que el registro fue creado
            $this->get('session')->getFlashBag()->add('notice', 'SE EDITO EXITOSAMENTE LA CONTRATACION');

            //envio a la vista
            return $this->redirect($this->generateUrl('contratacion_show', array(
                                                                                    'id' => $id,
                                                                                    'id_proveedor'=> $id_proveedor,
                                                                                    'id_presupuesto'=>$id_presupuesto,
                                                                                )));  
        }

            //envio a otra vista si el form no es válido
            return $this->render('ContenidosBundle:Contratacion:edit.html.twig', array(
            'entity'      => $entity,
            'tipoprov'    => $tipoprov,
            'prov'        => $prov,
            'pres'        => $pres,
            'id_presupuesto'    =>$id_presupuesto,
            'id_proveedor'  => $id_proveedor,
            'tipomoneda'    => $tipomoneda,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            ));
    }

    /*
    *
    * ELIMINAR UNA CONTRATACION.
    *
    */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            //obtengo los datos de la contratacion segun ID
            $entity = $em->getRepository('ContenidosBundle:Contratacion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Contratacion entity.');
            }

            //elimino el registro de la BD
            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('contratacion'));
    }

    /*
    *
    * Creates a form to delete a Contratacion entity by id.
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
}//fin de la clase