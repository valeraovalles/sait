<?php

namespace Frontend\ContenidosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\ContenidosBundle\Entity\Tipoproveedor;
use Frontend\ContenidosBundle\Form\TipoproveedorType;

/**
 * Tipoproveedor controller.
 *
 */
class TipoproveedorController extends Controller
{

    /**
     * Lists all Tipoproveedor entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ContenidosBundle:Tipoproveedor')->findAll();

        return $this->render('ContenidosBundle:Tipoproveedor:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Tipoproveedor entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Tipoproveedor();
        $form = $this->createForm(new TipoproveedorType(), $entity);
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
    public function newAction()
    {
        $entity = new Tipoproveedor();
        $form   = $this->createForm(new TipoproveedorType(), $entity);

        return $this->render('ContenidosBundle:Tipoproveedor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tipoproveedor entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:Tipoproveedor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tipoproveedor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

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

        $entity = $em->getRepository('ContenidosBundle:Tipoproveedor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tipoproveedor entity.');
        }

        $editForm = $this->createForm(new TipoproveedorType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContenidosBundle:Tipoproveedor:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Tipoproveedor entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:Tipoproveedor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tipoproveedor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TipoproveedorType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipoproveedor_edit', array('id' => $id)));
        }

        return $this->render('ContenidosBundle:Tipoproveedor:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tipoproveedor entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ContenidosBundle:Tipoproveedor')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tipoproveedor entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

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
}
