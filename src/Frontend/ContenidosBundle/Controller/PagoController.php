<?php

namespace Frontend\ContenidosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

//ASOCIO LAS ENTIDADES QUE SE UTILIZARAN
use Frontend\ContenidosBundle\Entity\Pago;
use Frontend\ContenidosBundle\Entity\Datosproveedor;
use Frontend\ContenidosBundle\Entity\Presupuesto;

//ASOCIO LOS FORMULARIOS QUE SE UTILIZARAN
use Frontend\ContenidosBundle\Form\PagoType;

/**
 * CONTROLADOR ENTIDAD PAGOS
 *
 */
class PagoController extends Controller
{

    /*
    *
    * LISTA DE TODOS LOS PAGOS 
    *
    */
    public function indexAction($id_contratacion)
    {
        $em = $this->getDoctrine()->getManager();

        //OBTENGO LOS DATOS DE LOS PAGOS ASOCIADOS A UNA CONTRATACION
        $entities = $em->getRepository('ContenidosBundle:Pago')->findByIdContratacion($id_contratacion);

        //RETORNO A LA VISTA PARA MOSTRAR LISTADO
        return $this->render('ContenidosBundle:Pago:index.html.twig', array(
            'entities' => $entities,
            'id_contratacion' => $id_contratacion,
        ));
    }
    
    /*
    *
    * FUNCION PARA CREAR UN NUEVO PAGO
    *
    */
    public function createAction(Request $request,$id_contratacion)
    {
        $em = $this->getDoctrine()->getManager();

        //OBTENGO LOS DATOS DEL PROVEEDOR DE ACUERDO A UNA CONTRATACION 
        $entities = $em->getRepository('ContenidosBundle:Datosproveedor')->findBynombre($id_contratacion);


        echo $id_contratacion;
        $id = 2;

        //INSTANCIO LA VARIABLE ENTITY A LA CLASE PAGO
        $entity  = new Pago();

        //ASOCIO LOS CAMPOS DEL FORMULARIO A LA VARIABLE ENTITY
        $form = $this->createForm(new PagoType(), $entity);

        //OBTENGO LOS DATOS QUE ENVIO EL USUARIO A TRAVES DEL FORMULARIO $form
        $form->bind($request);

        //VERIFICO SI EL  FORMULARIO ES VALIDO
        if($form->isValid()) 
        {
            //SETEO EL ID DEL PROVEEDOR
            $entity->setidProveedor($id);

            //INSERTO LOS VALORES EN LA TABLA PAGO
            $em->persist($entity);
            $em->flush();

            //envio a notificacion de que el registro fue creado
            $this->get('session')->getFlashBag()->add('notice', ' SE REGISTRO EXITOSAMENTE EL PAGO');

            //ENVIO A LA VISTA SHOW PARA MOSTRAR PAGO CREADO
            return $this->redirect($this->generateUrl('pago_show', array(
                                                                         'id'              => $entity->getId(),
                                                                         'id_contratacion' => $id_contratacion,
                                                                        )));
            
        }
            //ENVIO A LA VISTA NEW PARA MOSTRAR FORMULARIO DE PAGO
            return $this->render('ContenidosBundle:Pago:New.html.twig', array(
                'entity' => $entity,
                'form'   => $form->createView(),
                'id_contratacion' => $id_contratacion,
            ));
    }

    /*
    *
    * FUNCION PARA MOSTRAR EL FORMULARIO PARA CREAR NUEVO PAGO.
    *
    */
    public function newAction($id_contratacion)
    {
        //INSTANCIO LA CLASE PAGO
        $entity = new Pago();

        //ASOCIO LOS CAMPOS DEL FORMULARIO A LA VARIABLE ENTITY
        $form   = $this->createForm(new PagoType(), $entity);

        //ENVIO A LA VISTA NEW PARA MOSTRAR FORMULARIO
        return $this->render('ContenidosBundle:Pago:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'id_contratacion' => $id_contratacion,
        ));
    }

    /*
    *
    * FUNCION PARA MOSTRAR DETALLES DEL PAGO
    *
    */
    public function showAction($id,$id_contratacion)
    {
        $em = $this->getDoctrine()->getManager();

        //OBTENGO LOS DATOS DEL PAGO DE ACUERDO AL ID ENVIADO
        $entity = $em->getRepository('ContenidosBundle:Pago')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pago entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        //ENVIO A LA VISTA SHOW PARA MOSTRAR LOS DETALLES DEL PAGO
        return $this->render('ContenidosBundle:Pago:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        
            'id_contratacion' => $id_contratacion,
            ));
    }

    /*
    *
    * FUNCION PARA MOSTRAR EL FORMULARIO DEL PAGO(PARA EDITAR).
    *
    */
    public function editAction($id,$id_contratacion)
    {
        $em = $this->getDoctrine()->getManager();

        //OBTENGO INFORMACION DEL PAGO DE ACUERDO AL ID ENVIADO
        $entity = $em->getRepository('ContenidosBundle:Pago')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pago entity.');
        }

        //ASOCIO LOS CAMPOS DEL FORMULARIO A LA VARIABLE ENTITY
        $editForm = $this->createForm(new PagoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        //ENVIO A LA VISTA EDIT PARA MOSTRAR EL FORMULARIO
        return $this->render('ContenidosBundle:Pago:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'id_contratacion' => $id_contratacion,
        ));
    }

    /*
    *
    * FUNCION PARA INSERTAR DATOS DEL PAGO EN LA BASE DE DATOS
    *
    */
    public function updateAction(Request $request, $id, $id_contratacion)
    {
        $em = $this->getDoctrine()->getManager();

        //OBTENGO INFORMACION DEL PAGO DE ACUERDO A SU ID
        $entity = $em->getRepository('ContenidosBundle:Pago')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pago entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        //ASOCIO LOS CAMPOS DEL FORMULARIO A LA VARIABLE ENTITY
        $editForm = $this->createForm(new PagoType(), $entity);
        
        //OBTENGO LOS DATOS QUE ENVIO EL USUARIO A TRAVES DEL FORMULARIO $form
        $editForm->bind($request);

        //VERIFICO SI EL  FORMULARIO ES VALIDO
        if ($editForm->isValid()) 
        {
            //INSERTO LOS DATOS EN LA BASE DE DATOS
            $em->persist($entity);
            $em->flush();

            //envio a notificacion de que el registro fue creado
            $this->get('session')->getFlashBag()->add('notice', ' SE EDITO EXITOSAMENTE EL PAGO');

            //ENVIO A LA VISTA SHOW PARA VER EL DETALLE DE LOS CAMBIOS
            return $this->redirect($this->generateUrl('pago_show', array(   
                                                                            'id' => $id,
                                                                            'id_contratacion'=> $id_contratacion,
                                                                        )));
        }

        //ENVIO A LA VISTA ANTERIOR SI EL FORMULARIO NO ES VALIDO
        return $this->render('ContenidosBundle:Pago:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /*
    *
    * FUNCION PARA ELIMINAR PAGOS.
    *
    */
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createDeleteForm($id);

        //OBTENGO LOS DATOS QUE ENVIO EL USUARIO A TRAVES DEL FORMULARIO $form
        $form->bind($request);

        //DETERMINO SI EL FORMULARIO ES VALIDO
        if ($form->isValid()) 
        {
            //OBTENGO LOS DATOS DEL PAGO DE ACUERDO A SU ID
            $entity = $em->getRepository('ContenidosBundle:Pago')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Pago entity.');
            }

            //ELIMINO LOS DATOS DE LA BASE DE DATOS
            $em->remove($entity);
            $em->flush();
        }

        //ENVIO A VISTA DE INICIO
        return $this->redirect($this->generateUrl('pago'));
    }

    /**
     * Creates a form to delete a Pago entity by id.
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