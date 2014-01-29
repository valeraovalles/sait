<?php

namespace Frontend\ContenidosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

//ASOCIO LAS ENTIDADES QUE SE USARAN
use Frontend\ContenidosBundle\Entity\Tipoproveedor;

//ASOCIO LOS FORMULARIOS QUE SE UTILIZARAN
use Frontend\ContenidosBundle\Form\TipoproveedorType;

/*
*
* CONTROLADOR PARA TIPO DE PROVEEDOR
*
*/
class TipoproveedorController extends Controller
{

    /**
     * LISTADO DE TODOS LOS TIPOS DE PROVEEDOR
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        //OBTENGO LOS DATOS DE TODOS LOS TIPOS DE PROVEEDOR 
        $entities = $em->getRepository('ContenidosBundle:Tipoproveedor')->findAll();

        //ENVIO A LA VISTA INDEX PARA MOSTRAR DATOS
        return $this->render('ContenidosBundle:Tipoproveedor:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * FUNCION PARA CREAR LOS TIPOS DE PROVEEDORES.
     *
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        //INSTANCIO LA CLASE TIPOPROVEEDOR
        $entity  = new Tipoproveedor();

        //ASOCIO LOS CAMPOS DEL FORMULARIO A LA VARIABLE ENTITY
        $form = $this->createForm(new TipoproveedorType(), $entity);

        //OBTENGO LOS DATOS QUE ENVIO EL USUARIO A TRAVES DEL FORMULARIO $form
        $form->bind($request);

        //VERIFICO SI EL FORMULARIO ES VALIDO
        if($form->isValid())
        {
            //INSERTO LOS DATOS EN LA BASE DE DATOS            
            $em->persist($entity);
            $em->flush();
        }
            //RETORNO A LA VISTA PRINCIPAL
            return $this->redirect($this->generateUrl('tipoproveedor', array('id' => $entity->getId())));
       
    }

    /**
     * FUNCION QUE MUESTRA EL FORMULARIO PARA INGRESAR NUEVO TIPO DE PROVEEDOR
     *
     */
    public function newAction()
    {
        //INSTANCIO LA CLASE TIPOPROVEEDOR
        $entity = new Tipoproveedor();

        //ASOCIO LOS CAMPOS DEL FORMULARIO A LA VARIABLE ENTITY
        $form   = $this->createForm(new TipoproveedorType(), $entity);

        //ENVIO A LA VISTA
        return $this->render('ContenidosBundle:Tipoproveedor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * MUESTRA EL DETALLE DE LOS TIPOS DE PROVEEDOR
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        //OBTENGO VALORES DE TIPO PROVEEDOR DE ACUERDO AL ID
        $entity = $em->getRepository('ContenidosBundle:Tipoproveedor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tipoproveedor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        //ENVIO A LA VISTA
        return $this->render('ContenidosBundle:Tipoproveedor:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Tipoproveedor entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        //OBTENGO LOS DATOS DEL TIPO PROVEEDOR
        $entity = $em->getRepository('ContenidosBundle:Tipoproveedor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tipoproveedor entity.');
        }

        //ASOCIO LOS CAMPOS DEL FORMULARIO A LA VARIABLE ENTITY
        $editForm = $this->createForm(new TipoproveedorType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        //ENVIO A LA VISTA
        return $this->render('ContenidosBundle:Tipoproveedor:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * FUNCION PARA INSERTAR DATOS DEL TIPO DE PROVEEDOR 
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        //OBTENGO DATOS DEL TIPO DE PROVEEDOR SEGUN ID
        $entity = $em->getRepository('ContenidosBundle:Tipoproveedor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tipoproveedor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        //ASOCIO LOS CAMPOS DEL FORMULARIO A LA VARIABLE ENTITY
        $editForm = $this->createForm(new TipoproveedorType(), $entity);

        //OBTENGO LOS DATOS QUE ENVIO EL USUARIO A TRAVES DEL FORMULARIO $form
        $editForm->bind($request);

        //VERIFICO SI EL FORMUALRIO ES VALIDO
        if ($editForm->isValid()) 
        {
            //INSERTO LA INFORMACION EN LA BD
            $em->persist($entity);
            $em->flush();

            //ENVIO A LA VISTA
            return $this->redirect($this->generateUrl('tipoproveedor_edit', array('id' => $id)));
        }

        //ENVIO A OTRA VISTA SI EL FORM NO ES VALIDO
        return $this->render('ContenidosBundle:Tipoproveedor:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * FUNCION PARA ELIMINAR UN TIPO DE PROVEEDOR
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createDeleteForm($id);

        //OBTENGO LOS DATOS A TRAVES DEL FORMULARIO $form
        $form->bind($request);
        
        //OBTENGO LOS DATOS DEL TIPO DE PROVEEDOR SEGUN  ID
        $entity = $em->getRepository('ContenidosBundle:Tipoproveedor')->find($id);

        if (!$entity) 
        {
            throw $this->createNotFoundException('Unable to find Tipoproveedor entity.');
        }

        //VERIFICO SI EL FORMULARIO ES VALIDO
        if($form->isValid())
        {
            //ELIMINO EL TIPO DE PROVEEDOR
            $em->remove($entity);
            $em->flush();
        }

        //ENVIO A LA VISTA
        return $this->redirect($this->generateUrl('tipoproveedor'));
    }

    /**
     * Creates a form to delete a Tipoproveedor entity by id.
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