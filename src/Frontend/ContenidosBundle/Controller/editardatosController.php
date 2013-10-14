<?php

namespace Frontend\ContenidosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


use Frontend\ContenidosBundle\Entity\DetalleTipoproveedor;
use Frontend\ContenidosBundle\Form\DetalleType;

use Frontend\ContenidosBundle\Entity\Diasentrega;
use Frontend\ContenidosBundle\Form\DiasType;

use Frontend\ContenidosBundle\Entity\Analista;
use Frontend\ContenidosBundle\Form\AnalistaType;

use Frontend\ContenidosBundle\Entity\Unidadejecutora;
use Frontend\ContenidosBundle\Form\EjecutoraType;

use Frontend\ContenidosBundle\Entity\Unidadadministrativa;
use Frontend\ContenidosBundle\Form\AdministrativaType;

use Frontend\ContenidosBundle\Entity\Unidadsolicitante;
use Frontend\ContenidosBundle\Form\SolicitanteType;


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

     
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('indexdetalle', array('id' => $entity->getId())));
        
    }

    /**
     * Displays a form to create a new Tipoproveedor entity.
     *
     */
    public function newdetalleAction()
    {
       
        $entity = new DetalleTipoproveedor();
        $form   = $this->createForm(new DetalleType(), $entity);

        return $this->render('ContenidosBundle:Editar:newdetalle.html.twig', array(
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

    public function deletedetalleAction($id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ContenidosBundle:DetalleTipoproveedor')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find DetalleTipoproveedor entity.');
            }

            $em->remove($entity);
            $em->flush();
        

        return $this->redirect($this->generateUrl('indexdetalle'));
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
        $entity  = new Diasentrega();
        $form = $this->createForm(new DiasType(), $entity);
        $form->bind($request);

      
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('indexdias', array('id' => $entity->getId())));
        
    }

    /**
     * Displays a form to create a new Tipoproveedor entity.
     *
     */
    public function newdiasAction()
    {

        $entity = new Diasentrega();
        
        $form   = $this->createForm(new DiasType(), $entity);
        return $this->render('ContenidosBundle:Editar:newdias.html.twig', array(
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

        $entity = $em->getRepository('ContenidosBundle:Diasentrega')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Diasentrega entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new DiasType(), $entity);
        $editForm->bind($request);

       
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('indexdias', array('id' => $id)));
        
    }

    public function deletediasAction(Request $request,$id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ContenidosBundle:Diasentrega')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Diasentrega entity.');
            }

            $em->remove($entity);
            $em->flush();
        

        return $this->redirect($this->generateUrl('indexdias'));
    }

    ##############################################################################################
    #                                   TABLA ANALISTA
    ##############################################################################################

    public function indexanalistaAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ContenidosBundle:Analista')->findAll();

        return $this->render('ContenidosBundle:Editar:indexanalista.html.twig', array(
            'entities' => $entities,
        ));
    }

    public function createanalistaAction(Request $request)
    {

        $entity  = new Analista();
        $form = $this->createForm(new AnalistaType(), $entity);
        $form->bind($request);

        
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('indexanalista', array('id' => $entity->getId())));
    }

    /**
     * Displays a form to create a new Tipoproveedor entity.
     *
     */
    public function newanalistaAction()
    {
        $entity = new Analista();
        $form   = $this->createForm(new AnalistaType(), $entity);

        return $this->render('ContenidosBundle:Editar:newanalista.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Analista entity.
     *
     */
    public function editanalistaAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:Analista')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Analista entity.');
        }

        $editForm = $this->createForm(new AnalistaType(), $entity);

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContenidosBundle:Editar:editanalista.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Tipoproveedor entity.
     *
     */
    public function updateanalistaAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:Analista')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Analista entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AnalistaType(), $entity);
        $editForm->bind($request);

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('editanalista', array('id' => $id)));    
    }

    public function deleteanalistaAction($id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ContenidosBundle:Analista')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Analista entity.');
            }

            $em->remove($entity);
            $em->flush();
        

        return $this->redirect($this->generateUrl('indexanalista'));
    }



    ##############################################################################################
    #                                   TABLA UNIDADEJECUTIVA
    ##############################################################################################

    public function indexejecutoraAction()
    {

        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ContenidosBundle:Unidadejecutora')->findAll();

        return $this->render('ContenidosBundle:Editar:indexejecutora.html.twig', array(
            'entities' => $entities,
        ));
    }


    /**
     * Displays a form to edit an existing Unidadejecutora entity.
     *
     */
    public function editejecutoraAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:Unidadejecutora')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Unidadejecutora entity.');
        }

        $editForm = $this->createForm(new EjecutoraType(), $entity);

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContenidosBundle:Editar:editejecutora.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Unidadejecutora entity.
     *
     */
    public function updateejecutoraAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:Unidadejecutora')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Unidadejecutora entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new EjecutoraType(), $entity);
        $editForm->bind($request);

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('editejecutora', array('id' => $id)));    
    }

    public function createejecutoraAction(Request $request)
    {

        $entity  = new Unidadejecutora();
        $form = $this->createForm(new EjecutoraType(), $entity);
        $form->bind($request);

        
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('indexejecutora', array('id' => $entity->getId())));
    }

    /**
     * Displays a form to create a new Ejecutora entity.
     *
     */
    public function newejecutoraAction()
    {
        $entity = new Unidadejecutora();
        $form   = $this->createForm(new EjecutoraType(), $entity);

        return $this->render('ContenidosBundle:Editar:newejecutora.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    public function deleteejecutoraAction($id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ContenidosBundle:Unidadejecutora')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Unidadejecutora entity.');
            }

            $em->remove($entity);
            $em->flush();
        

        return $this->redirect($this->generateUrl('indexejecutora'));
    }


    ##############################################################################################
    #                                   TABLA UNIDADADMINISTRATIVA
    ##############################################################################################

    public function indexadministrativaAction()
    {

        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ContenidosBundle:Unidadadministrativa')->findAll();

        return $this->render('ContenidosBundle:Editar:indexadministrativa.html.twig', array(
            'entities' => $entities,
        ));
    }


    /**
     * Displays a form to edit an existing Unidadadministrativa entity.
     *
     */
    public function editadministrativaAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:Unidadadministrativa')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Unidadadministrativa entity.');
        }

        $editForm = $this->createForm(new AdministrativaType(), $entity);

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContenidosBundle:Editar:editadministrativa.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Unidadadministrativa entity.
     *
     */
    public function updateadministrativaAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:Unidadadministrativa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Unidadadministrativa entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AdministrativaType(), $entity);
        $editForm->bind($request);

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('editadministrativa', array('id' => $id)));    
    }

    public function createadministrativaAction(Request $request)
    {

        $entity  = new Unidadadministrativa();
        $form = $this->createForm(new AdministrativaType(), $entity);
        $form->bind($request);

        
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('indexadministrativa', array('id' => $entity->getId())));
    }

    /**
     * Displays a form to create a new Ejecutora entity.
     *
     */
    public function newadministrativaAction()
    {
        $entity = new Unidadadministrativa();
        $form   = $this->createForm(new AdministrativaType(), $entity);

        return $this->render('ContenidosBundle:Editar:newadministrativa.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    public function deleteadministrativaAction($id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ContenidosBundle:Unidadadministrativa')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Unidadadministrativa entity.');
            }

            $em->remove($entity);
            $em->flush();
        

        return $this->redirect($this->generateUrl('indexadministrativa'));
    }


    ##############################################################################################
    #                                   TABLA UNIDADSOLICITANTE
    ##############################################################################################

    public function indexsolicitanteAction()
    {

        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ContenidosBundle:Unidadsolicitante')->findAll();

        return $this->render('ContenidosBundle:Editar:indexsolicitante.html.twig', array(
            'entities' => $entities,
        ));
    }

    public function showsolicitanteAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ContenidosBundle:Unidadsolicitante')->find($id);

        return $this->render('ContenidosBundle:Editar:showsolicitante.html.twig', array(
            'entity' => $entities,
            ));
    }


    public function editsolicitanteAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:Unidadsolicitante')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Unidadsolicitante entity.');
        }

        $editForm = $this->createForm(new SolicitanteType(), $entity);

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContenidosBundle:Editar:editsolicitante.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Unidadsolicitante entity.
     *
     */
    public function updatesolicitanteAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:Unidadsolicitante')->find($id);

        $id_tipo = $entity->getIdTipoproveedor();

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Unidadsolicitante entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new SolicitanteType(), $entity);
        $editForm->bind($request);


            $entity->setIdTipoproveedor($id_tipo);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('editsolicitante', array('id' => $id)));    
    }


    public function createsolicitanteAction(Request $request)
    {

        $entity  = new Unidadsolicitante();
        $form = $this->createForm(new SolicitanteType(), $entity);
        $form->bind($request);

        
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('indexsolicitante', array('id' => $entity->getId())));
    }

    /**
     * Displays a form to create a new Ejecutora entity.
     *
     */
    public function newsolicitanteAction()
    {
        $entity = new Unidadsolicitante();
        $form   = $this->createForm(new SolicitanteType(), $entity);

        return $this->render('ContenidosBundle:Editar:newsolicitante.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    public function deletesolicitanteAction(Request $request,$id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ContenidosBundle:Unidadsolicitante')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find SolicitanteType entity.');
            }

            $em->remove($entity);
            $em->flush();
        

        return $this->redirect($this->generateUrl('indexsolicitante'));
    }


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