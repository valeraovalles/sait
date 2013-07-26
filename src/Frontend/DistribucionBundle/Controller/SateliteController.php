<?php

namespace Frontend\DistribucionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\DistribucionBundle\Entity\Satelite;
use Frontend\DistribucionBundle\Form\SateliteType;

use Symfony\Component\Security\Core\SecurityContext;
use Administracion\UsuarioBundle\Entity\Perfil;


/**
 * Satelite controller.
 *
 */
class SateliteController extends Controller
{

    /**
     * Lists all Satelite entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DistribucionBundle:Satelite')->findAll();

        return $this->render('DistribucionBundle:Satelite:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Satelite entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Satelite();
        $form = $this->createForm(new SateliteType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
            $perfil = $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);
            
            $entity->setUser($perfil);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('satelite_show', array('id' => $entity->getId())));
        }

        return $this->render('DistribucionBundle:Satelite:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Satelite entity.
     *
     */
    public function newAction()
    {
        $entity = new Satelite();
        $form   = $this->createForm(new SateliteType(), $entity);

        return $this->render('DistribucionBundle:Satelite:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Satelite entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DistribucionBundle:Satelite')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Satelite entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DistribucionBundle:Satelite:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Satelite entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DistribucionBundle:Satelite')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Satelite entity.');
        }

        $editForm = $this->createForm(new SateliteType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DistribucionBundle:Satelite:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Satelite entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DistribucionBundle:Satelite')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Satelite entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new SateliteType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
            $perfil = $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);

            $em = $this->getDoctrine()->getManager();
            $entity->setUser($perfil);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('satelite_edit', array('id' => $id)));
        }

        return $this->render('DistribucionBundle:Satelite:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Satelite entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DistribucionBundle:Satelite')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Satelite entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('satelite'));
    }

    /**
     * Creates a form to delete a Satelite entity by id.
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
