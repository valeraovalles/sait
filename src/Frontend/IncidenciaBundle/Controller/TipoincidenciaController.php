<?php

namespace Frontend\IncidenciaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\IncidenciaBundle\Entity\Tipoincidencia;
use Frontend\IncidenciaBundle\Form\TipoincidenciaType;

/**
 * Tipoincidencia controller.
 *
 */
class TipoincidenciaController extends Controller
{

    /**
     * Lists all Tipoincidencia entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IncidenciaBundle:Tipoincidencia')->findAll();

        return $this->render('IncidenciaBundle:Tipoincidencia:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Tipoincidencia entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Tipoincidencia();
        $form = $this->createForm(new TipoincidenciaType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipoincidencia_show', array('id' => $entity->getId())));
        }

        return $this->render('IncidenciaBundle:Tipoincidencia:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Tipoincidencia entity.
     *
     */
    public function newAction()
    {
        $entity = new Tipoincidencia();
        $form   = $this->createForm(new TipoincidenciaType(), $entity);

        return $this->render('IncidenciaBundle:Tipoincidencia:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tipoincidencia entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IncidenciaBundle:Tipoincidencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tipoincidencia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IncidenciaBundle:Tipoincidencia:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Tipoincidencia entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IncidenciaBundle:Tipoincidencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tipoincidencia entity.');
        }

        $editForm = $this->createForm(new TipoincidenciaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IncidenciaBundle:Tipoincidencia:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Tipoincidencia entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IncidenciaBundle:Tipoincidencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tipoincidencia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TipoincidenciaType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipoincidencia_edit', array('id' => $id)));
        }

        return $this->render('IncidenciaBundle:Tipoincidencia:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tipoincidencia entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IncidenciaBundle:Tipoincidencia')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tipoincidencia entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tipoincidencia'));
    }

    /**
     * Creates a form to delete a Tipoincidencia entity by id.
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
