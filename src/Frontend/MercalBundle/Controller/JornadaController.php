<?php

namespace Frontend\MercalBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\MercalBundle\Entity\Jornada;
use Frontend\MercalBundle\Form\JornadaType;

/**
 * Jornada controller.
 *
 */
class JornadaController extends Controller
{

    /**
     * Lists all Jornada entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MercalBundle:Jornada')->findAll();

        return $this->render('MercalBundle:Jornada:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Jornada entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Jornada();
        $form = $this->createForm(new JornadaType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Se ha creado la jornada exitosamente');
            return $this->redirect($this->generateUrl('jornada_show', array('id' => $entity->getId())));
        }

        return $this->render('MercalBundle:Jornada:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Jornada entity.
     *
     */
    public function newAction()
    {
        $entity = new Jornada();
        $form   = $this->createForm(new JornadaType(), $entity);

        
        return $this->render('MercalBundle:Jornada:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Jornada entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MercalBundle:Jornada')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Jornada entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MercalBundle:Jornada:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Jornada entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MercalBundle:Jornada')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Jornada entity.');
        }

        $editForm = $this->createForm(new JornadaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MercalBundle:Jornada:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Jornada entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MercalBundle:Jornada')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Jornada entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new JornadaType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Se ha editado la jornada exitosamente');
            return $this->redirect($this->generateUrl('jornada_edit', array('id' => $id)));
        }

        return $this->render('MercalBundle:Jornada:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Jornada entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MercalBundle:Jornada')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Jornada entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        $this->get('session')->getFlashBag()->add('notice', 'Se ha eliminado la jornada exitosamente');
        return $this->redirect($this->generateUrl('jornada'));
    }

    /**
     * Creates a form to delete a Jornada entity by id.
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
