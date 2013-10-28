<?php

namespace Frontend\ContenidosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\ContenidosBundle\Entity\Controlpagounidad;
use Frontend\ContenidosBundle\Form\ControlpagounidadType;

/**
 * Controlpagounidad controller.
 *
 */
class ControlpagounidadController extends Controller
{

    /**
     * Lists all Controlpagounidad entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ContenidosBundle:Controlpagounidad')->findAll();

        return $this->render('ContenidosBundle:Controlpagounidad:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Controlpagounidad entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Controlpagounidad();
        $form = $this->createForm(new ControlpagounidadType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('controlpagounidad_show', array('id' => $entity->getId())));
        }

        return $this->render('ContenidosBundle:Controlpagounidad:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Controlpagounidad entity.
     *
     */
    public function newAction()
    {
        $entity = new Controlpagounidad();
        $form   = $this->createForm(new ControlpagounidadType(), $entity);

        return $this->render('ContenidosBundle:Controlpagounidad:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Controlpagounidad entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:Controlpagounidad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Controlpagounidad entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContenidosBundle:Controlpagounidad:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Controlpagounidad entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:Controlpagounidad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Controlpagounidad entity.');
        }

        $editForm = $this->createForm(new ControlpagounidadType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContenidosBundle:Controlpagounidad:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Controlpagounidad entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:Controlpagounidad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Controlpagounidad entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ControlpagounidadType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('controlpagounidad_edit', array('id' => $id)));
        }

        return $this->render('ContenidosBundle:Controlpagounidad:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Controlpagounidad entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ContenidosBundle:Controlpagounidad')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Controlpagounidad entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('controlpagounidad'));
    }

    /**
     * Creates a form to delete a Controlpagounidad entity by id.
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