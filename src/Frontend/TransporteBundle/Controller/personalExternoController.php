<?php

namespace Frontend\TransporteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    
use Frontend\TransporteBundle\Form\personalExternoType;
use Frontend\TransporteBundle\Entity\personalExterno;

/**
 * personalExterno controller.
 *
 */
class personalExternoController extends Controller
{

    /**
     * Lists all personalExterno entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('TransporteBundle:personalExterno')->findAll();

        return $this->render('TransporteBundle:personalExterno:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new personalExterno entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new personalExterno();
        $form = $this->createForm(new personalExternoType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('notice', 'EL REGISTRO FUE CREADO CON EXITO');
            return $this->redirect($this->generateUrl('personalexterno_show', array('id' => $entity->getId())));
        }

        return $this->render('TransporteBundle:personalExterno:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new personalExterno entity.
     *
     */
    public function newAction()
    {
        $entity = new personalExterno();
        $form   = $this->createForm(new personalExternoType(), $entity);

        return $this->render('TransporteBundle:personalExterno:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a personalExterno entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TransporteBundle:personalExterno')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find personalExterno entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TransporteBundle:personalExterno:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing personalExterno entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TransporteBundle:personalExterno')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find personalExterno entity.');
        }

        $editForm = $this->createForm(new personalExternoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TransporteBundle:personalExterno:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing personalExterno entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TransporteBundle:personalExterno')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find personalExterno entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new personalExternoType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('notice', 'LOS DATOS FUERON MODIFICADOS CON EXITO');
            return $this->redirect($this->generateUrl('personalexterno_edit', array('id' => $id)));
        }

        return $this->render('TransporteBundle:personalExterno:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a personalExterno entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TransporteBundle:personalExterno')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find personalExterno entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('personalexterno_list'));
    }

    /**
     * Creates a form to delete a personalExterno entity by id.
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
