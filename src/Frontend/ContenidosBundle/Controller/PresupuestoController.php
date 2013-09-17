<?php

namespace Frontend\ContenidosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\ContenidosBundle\Entity\Presupuesto;
use Frontend\ContenidosBundle\Form\PresupuestoType;

/**
 * Presupuesto controller.
 *
 */
class PresupuestoController extends Controller
{

    /**
     * Lists all Presupuesto entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ContenidosBundle:Presupuesto')->findAll();

        return $this->render('ContenidosBundle:Presupuesto:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Presupuesto entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Presupuesto();
        $form = $this->createForm(new PresupuestoType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('presupuesto_show', array('id' => $entity->getId())));
        }

        return $this->render('ContenidosBundle:Presupuesto:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Presupuesto entity.
     *
     */
    public function newAction()
    {
        $entity = new Presupuesto();
        $form   = $this->createForm(new PresupuestoType(), $entity);

        return $this->render('ContenidosBundle:Presupuesto:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Presupuesto entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:Presupuesto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Presupuesto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContenidosBundle:Presupuesto:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Presupuesto entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:Presupuesto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Presupuesto entity.');
        }

        $editForm = $this->createForm(new PresupuestoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContenidosBundle:Presupuesto:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Presupuesto entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:Presupuesto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Presupuesto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PresupuestoType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('presupuesto_edit', array('id' => $id)));
        }

        return $this->render('ContenidosBundle:Presupuesto:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Presupuesto entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ContenidosBundle:Presupuesto')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Presupuesto entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('presupuesto'));
    }

    /**
     * Creates a form to delete a Presupuesto entity by id.
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
