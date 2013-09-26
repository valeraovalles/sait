<?php

namespace Frontend\ContenidosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


use Frontend\ContenidosBundle\Entity\DetalleTipoproveedor;
use Frontend\ContenidosBundle\Entity\Diasentrega;
use Frontend\ContenidosBundle\Entity\Analista;
use Frontend\ContenidosBundle\Entity\Unidadejecutora;
use Frontend\ContenidosBundle\Entity\Unidadadministrativa;
use Frontend\ContenidosBundle\Entity\Unidadsolicitante;

use Frontend\ContenidosBundle\Form\DetalleType;
use Frontend\ContenidosBundle\Form\DiasType;



#

class editardatosController extends Controller
{
    ##############################################################################################
    #                                   TABLA DETALLETIPOPROVEEDOR
    ##############################################################################################
	public function indexdetalleAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ContenidosBundle:DetalleTipoproveedor')->findAll();

        return $this->render('ContenidosBundle:Editar:indexdetalle.html.twig', array(
            'entities' => $entities,
        ));
    }

    public function createdetalleAction(Request $request)
    {
        $entity  = new DetalleTipoproveedor();
        $form = $this->createForm(new DetalleType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipoproveedor_show', array('id' => $entity->getId())));
        }

        return $this->render('ContenidosBundle:Tipoproveedor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Tipoproveedor entity.
     *
     */
    public function newdetalleAction()
    {
        $entity = new Tipoproveedor();
        $form   = $this->createForm(new TipoproveedorType(), $entity);

        return $this->render('ContenidosBundle:Tipoproveedor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Tipoproveedor entity.
     *
     */
    public function editdetalleAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:DetalleTipoproveedor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DetalleTipoproveedor entity.');
        }
        $editForm = $this->createForm(new DetalleType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContenidosBundle:Editar:editdetalle.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Tipoproveedor entity.
     *
     */
    public function updatedetalleAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:DetalleTipoproveedor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DetalleTipoproveedor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new DetalleType(), $entity);
        $editForm->bind($request);

       
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('editdetalle', array('id' => $id)));
        
    }
    
    ##############################################################################################
    #                                   TABLA DIASENTREGA
    ##############################################################################################

    public function indexdiasAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ContenidosBundle:Diasentrega')->findAll();

        return $this->render('ContenidosBundle:Editar:indexdias.html.twig', array(
            'entities' => $entities,
        ));
    }

    public function creatediasAction(Request $request)
    {
        $entity  = new DetalleTipoproveedor();
        $form = $this->createForm(new DetalleType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipoproveedor_show', array('id' => $entity->getId())));
        }

        return $this->render('ContenidosBundle:Tipoproveedor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Tipoproveedor entity.
     *
     */
    public function newdiasAction()
    {
        $entity = new Tipoproveedor();
        $form   = $this->createForm(new TipoproveedorType(), $entity);

        return $this->render('ContenidosBundle:Tipoproveedor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Tipoproveedor entity.
     *
     */
    public function editdiasAction($id)
    {


        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:Diasentrega')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Diasentrega entity.');
        }

        $editForm = $this->createForm(new DiasType(), $entity);

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContenidosBundle:Editar:editdias.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Tipoproveedor entity.
     *
     */
    public function updatediasAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:DetalleTipoproveedor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DetalleTipoproveedor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new DetalleType(), $entity);
        $editForm->bind($request);

       
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('editdetalle', array('id' => $id)));
        
    }



    



    ##############################################################################################
    #                                   TABLA ANALISTA
    ##############################################################################################



    ##############################################################################################
    #                                   TABLA UNIDADEJECUTIVA
    ##############################################################################################



    ##############################################################################################
    #                                   TABLA UNIDADADMINISTRATIVA
    ##############################################################################################



    ##############################################################################################
    #                                   TABLA UNIDADSOLICITANTE
    ##############################################################################################





    ##############################################################################################
    #                                   FUNCION CREATEDELETEFORM
    ##############################################################################################

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





}