<?php

namespace Frontend\TransporteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\TransporteBundle\Entity\Vehiculos;
use Frontend\TransporteBundle\Form\VehiculosType;

/**
 * Vehiculos controller.
 *
 */
class VehiculosController extends Controller
{

    /**
     * Lists all Vehiculos entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TransporteBundle:Vehiculos')->findAll();

        return $this->render('TransporteBundle:Vehiculos:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Vehiculos entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Vehiculos();
        $form = $this->createForm(new VehiculosType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('notice', 'EL REGISTRO FUE CREADO CON EXITO');
            return $this->redirect($this->generateUrl('transporte_show', array('id' => $entity->getId())));
        }

        return $this->render('TransporteBundle:Vehiculos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Vehiculos entity.
     *
     */
    public function newAction()
    {
        $entity = new Vehiculos();
        $form   = $this->createForm(new VehiculosType(), $entity);

        return $this->render('TransporteBundle:Vehiculos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Vehiculos entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TransporteBundle:Vehiculos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Vehiculos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TransporteBundle:Vehiculos:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Vehiculos entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TransporteBundle:Vehiculos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Vehiculos entity.');
        }

        $editForm = $this->createForm(new VehiculosType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TransporteBundle:Vehiculos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Vehiculos entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TransporteBundle:Vehiculos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Vehiculos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new VehiculosType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('notice', 'LOS DATOS FUERON MODIFICADOS CON EXITO');
            return $this->redirect($this->generateUrl('transporte_edit', array('id' => $id)));
        }

        return $this->render('TransporteBundle:Vehiculos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Vehiculos entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TransporteBundle:Vehiculos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Vehiculos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('transporte'));
    }

    /**
     * Creates a form to delete a Vehiculos entity by id.
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
