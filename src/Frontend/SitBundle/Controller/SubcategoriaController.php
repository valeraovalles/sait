<?php

namespace Frontend\SitBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\SitBundle\Entity\Subcategoria;
use Frontend\SitBundle\Form\SubcategoriaType;

/**
 * Subcategoria controller.
 *
 */
class SubcategoriaController extends Controller
{

    /**
     * Lists all Subcategoria entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SitBundle:Subcategoria')->findAll();

        return $this->render('SitBundle:Subcategoria:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Subcategoria entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Subcategoria();
        $form = $this->createForm(new SubcategoriaType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('subcategoria_show', array('id' => $entity->getId())));
        }

        return $this->render('SitBundle:Subcategoria:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Subcategoria entity.
     *
     */
    public function newAction()
    {
        $entity = new Subcategoria();
        $form   = $this->createForm(new SubcategoriaType(), $entity);

        return $this->render('SitBundle:Subcategoria:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Subcategoria entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SitBundle:Subcategoria')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Subcategoria entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SitBundle:Subcategoria:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Subcategoria entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SitBundle:Subcategoria')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Subcategoria entity.');
        }

        $editForm = $this->createForm(new SubcategoriaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SitBundle:Subcategoria:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Subcategoria entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SitBundle:Subcategoria')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Subcategoria entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new SubcategoriaType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('subcategoria_edit', array('id' => $id)));
        }

        return $this->render('SitBundle:Subcategoria:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Subcategoria entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SitBundle:Subcategoria')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Subcategoria entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('subcategoria'));
    }

    /**
     * Creates a form to delete a Subcategoria entity by id.
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
