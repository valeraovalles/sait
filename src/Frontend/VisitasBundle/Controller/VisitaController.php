<?php

namespace Frontend\VisitasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\VisitasBundle\Entity\Visita;
use Frontend\VisitasBundle\Form\VisitaType;

//--------------------------------------------
use Frontend\VisitasBundle\Entity\Usuario;
use Frontend\VisitasBundle\Form\UsuarioType;
//--------------------------------------------

/**
 * Visita controller.
 *
 */
class VisitaController extends Controller
{

    /**
     * Lists all Visita entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FrontendVisitasBundle:Visita')->findAll();

        return $this->render('FrontendVisitasBundle:Visita:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Visita entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Visita();
        $form = $this->createForm(new VisitaType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('visita_show_control', array('id' => $entity->getId())));
        }

        return $this->render('FrontendVisitasBundle:Visita:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Visita entity.
     *
     */
    public function newAction()
    {
        $entity = new Visita();
        $form   = $this->createForm(new VisitaType(), $entity);

        return $this->render('FrontendVisitasBundle:Visita:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Visita entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FrontendVisitasBundle:Visita')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Visita entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FrontendVisitasBundle:Visita:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Visita entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FrontendVisitasBundle:Visita')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Visita entity.');
        }

        $editForm = $this->createForm(new VisitaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FrontendVisitasBundle:Visita:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Visita entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FrontendVisitasBundle:Visita')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Visita entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new VisitaType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('visita_edit_control', array('id' => $id)));
        }

        return $this->render('FrontendVisitasBundle:Visita:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Visita entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FrontendVisitasBundle:Visita')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Visita entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('visita_control'));
    }

    /**
     * Creates a form to delete a Visita entity by id.
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
