<?php

namespace Frontend\ContratosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\ContratosBundle\Entity\Direccionsolicitante;
use Frontend\ContratosBundle\Form\DireccionsolicitanteType;

/**
 * Direccionsolicitante controller.
 *
 */
class DireccionsolicitanteController extends Controller
{

    /**
     * Lists all Direccionsolicitante entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ContratosBundle:Direccionsolicitante')->findAll();

        return $this->render('ContratosBundle:Direccionsolicitante:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Direccionsolicitante entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Direccionsolicitante();
        $form = $this->createForm(new DireccionsolicitanteType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $entities = $em->getRepository('ContratosBundle:Direccionsolicitante')->findAll();
            return $this->redirect($this->generateUrl('Direccionsolicitante', array('entities' => $entities)));
        }

        return $this->render('ContratosBundle:Direccionsolicitante:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Direccionsolicitante entity.
     *
     */
    public function newAction()
    {
        $entity = new Direccionsolicitante();
        $form   = $this->createForm(new DireccionsolicitanteType(), $entity);

        return $this->render('ContratosBundle:Direccionsolicitante:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Direccionsolicitante entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContratosBundle:Direccionsolicitante')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Direccionsolicitante entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContratosBundle:Direccionsolicitante:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Direccionsolicitante entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContratosBundle:Direccionsolicitante')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Direccionsolicitante entity.');
        }

        $editForm = $this->createForm(new DireccionsolicitanteType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContratosBundle:Direccionsolicitante:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Direccionsolicitante entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContratosBundle:Direccionsolicitante')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Direccionsolicitante entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new DireccionsolicitanteType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            $entities = $em->getRepository('ContratosBundle:Direccionsolicitante')->findAll();
            return $this->redirect($this->generateUrl('Direccionsolicitante', array('entities' => $entities)));

        }

        return $this->render('ContratosBundle:Direccionsolicitante:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Direccionsolicitante entity.
     *
     */
    public function deleteAction( $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ContratosBundle:Direccionsolicitante')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Direccionsolicitante entity.');
        }

        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('Direccionsolicitante'));
    }

    /**
     * Creates a form to delete a Direccionsolicitante entity by id.
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
