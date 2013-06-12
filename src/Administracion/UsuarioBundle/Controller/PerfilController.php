<?php

namespace Administracion\UsuarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Administracion\UsuarioBundle\Entity\Perfil;
use Administracion\UsuarioBundle\Form\PerfilType;

/**
 * Perfil controller.
 *
 */
class PerfilController extends Controller
{
    /**
     * Lists all Perfil entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UsuarioBundle:Perfil')->findAll();

        return $this->render('UsuarioBundle:Perfil:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Perfil entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UsuarioBundle:Perfil')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Perfil entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UsuarioBundle:Perfil:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Perfil entity.
     *
     */
    public function newAction()
    {
        $entity = new Perfil();
        $form   = $this->createForm(new PerfilType(), $entity);

        return $this->render('UsuarioBundle:Perfil:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Perfil entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Perfil();
        $form = $this->createForm(new PerfilType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('perfil_show', array('id' => $entity->getId())));
        }

        return $this->render('UsuarioBundle:Perfil:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Perfil entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UsuarioBundle:Perfil')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Perfil entity.');
        }

        $editForm = $this->createForm(new PerfilType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UsuarioBundle:Perfil:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Perfil entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UsuarioBundle:Perfil')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Perfil entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PerfilType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('perfil_edit', array('id' => $id)));
        }

        return $this->render('UsuarioBundle:Perfil:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Perfil entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UsuarioBundle:Perfil')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Perfil entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('perfil'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
