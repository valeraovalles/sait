<?php

namespace Frontend\DirectorioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\DirectorioBundle\Entity\Institucion;
use Frontend\DirectorioBundle\Form\InstitucionType;

/**
 * Institucion controller.
 *
 */
class InstitucionController extends Controller
{

    /**
     * Lists all Institucion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DirectorioBundle:Institucion')->findAll();

        return $this->render('DirectorioBundle:Institucion:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Institucion entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Institucion();
        $form = $this->createForm(new InstitucionType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('institucion_show', array('id' => $entity->getId())));
        }

        return $this->render('DirectorioBundle:Institucion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Institucion entity.
     *
     */
    public function newAction()
    {
        $entity = new Institucion();
        $form   = $this->createForm(new InstitucionType(), $entity);

        return $this->render('DirectorioBundle:Institucion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Institucion entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DirectorioBundle:Institucion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Institucion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DirectorioBundle:Institucion:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Institucion entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DirectorioBundle:Institucion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Institucion entity.');
        }

        $editForm = $this->createForm(new InstitucionType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DirectorioBundle:Institucion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Institucion entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DirectorioBundle:Institucion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Institucion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new InstitucionType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('notice', 'La actualización de realizó correctamente.');
            return $this->redirect($this->generateUrl('institucion_show', array('id' => $id)));
        }

        return $this->render('DirectorioBundle:Institucion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Institucion entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DirectorioBundle:Institucion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Institucion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('institucion'));
    }

    /**
     * Creates a form to delete a Institucion entity by id.
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
