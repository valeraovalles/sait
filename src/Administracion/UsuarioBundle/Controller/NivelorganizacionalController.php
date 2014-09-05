<?php

namespace Administracion\UsuarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Administracion\UsuarioBundle\Entity\Nivelorganizacional;
use Administracion\UsuarioBundle\Form\NivelorganizacionalType;

/**
 * Nivelorganizacional controller.
 *
 */
class NivelorganizacionalController extends Controller
{

    /**
     * Lists all Nivelorganizacional entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UsuarioBundle:Nivelorganizacional')->findAll();

        return $this->render('UsuarioBundle:Nivelorganizacional:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Nivelorganizacional entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Nivelorganizacional();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('nivelorganizacional_show', array('id' => $entity->getId())));
        }

        return $this->render('UsuarioBundle:Nivelorganizacional:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Nivelorganizacional entity.
     *
     * @param Nivelorganizacional $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Nivelorganizacional $entity)
    {
        $form = $this->createForm(new NivelorganizacionalType(), $entity, array(
            'action' => $this->generateUrl('nivelorganizacional_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Nivelorganizacional entity.
     *
     */
    public function newAction()
    {
        $entity = new Nivelorganizacional();
        $form   = $this->createCreateForm($entity);

        return $this->render('UsuarioBundle:Nivelorganizacional:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Nivelorganizacional entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UsuarioBundle:Nivelorganizacional')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Nivelorganizacional entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UsuarioBundle:Nivelorganizacional:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Nivelorganizacional entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UsuarioBundle:Nivelorganizacional')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Nivelorganizacional entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UsuarioBundle:Nivelorganizacional:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Nivelorganizacional entity.
    *
    * @param Nivelorganizacional $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Nivelorganizacional $entity)
    {
        $form = $this->createForm(new NivelorganizacionalType(), $entity, array(
            'action' => $this->generateUrl('nivelorganizacional_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Nivelorganizacional entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UsuarioBundle:Nivelorganizacional')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Nivelorganizacional entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('nivelorganizacional_edit', array('id' => $id)));
        }

        return $this->render('UsuarioBundle:Nivelorganizacional:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Nivelorganizacional entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UsuarioBundle:Nivelorganizacional')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Nivelorganizacional entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('nivelorganizacional'));
    }

    /**
     * Creates a form to delete a Nivelorganizacional entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('nivelorganizacional_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
