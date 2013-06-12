<?php

namespace Frontend\DistribucionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\DistribucionBundle\Entity\Paquete;
use Frontend\DistribucionBundle\Form\PaqueteType;

/**
 * Paquete controller.
 *
 */
class PaqueteController extends Controller
{
    /**
     * Lists all Paquete entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DistribucionBundle:Paquete')->findAll();

        return $this->render('DistribucionBundle:Paquete:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Paquete entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Paquete();
        $form = $this->createForm(new PaqueteType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
            $perfil = $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);
            $entity->setUser($perfil);

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('paquete_show', array('id' => $entity->getId())));
        }

        return $this->render('DistribucionBundle:Paquete:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Paquete entity.
     *
     */
    public function newAction()
    {
        $entity = new Paquete();
        $form   = $this->createForm(new PaqueteType(), $entity);

        return $this->render('DistribucionBundle:Paquete:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Paquete entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DistribucionBundle:Paquete')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Paquete entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DistribucionBundle:Paquete:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Paquete entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DistribucionBundle:Paquete')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Paquete entity.');
        }

        $editForm = $this->createForm(new PaqueteType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DistribucionBundle:Paquete:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Paquete entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DistribucionBundle:Paquete')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Paquete entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PaqueteType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
            $perfil = $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);
            $entity->setUser($perfil);

            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Actualización exitosa!');
            return $this->redirect($this->generateUrl('paquete_show', array('id' => $id)));
        }

        return $this->render('DistribucionBundle:Paquete:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Paquete entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DistribucionBundle:Paquete')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Paquete entity.');
            }

           try {
                $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
                $perfil = $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);
                $entity->setUser($perfil);
                $em->persist($entity);
                $em->flush();

                $em->remove($entity);
                $em->flush();
            } catch(\Exception $e) {
                $this->get('session')->getFlashBag()->add('alert', 'No se puede eliminar el paquete "'.$entity->getPaquete().'" porque se encuentra asociado a un operador.');
            }
        }

        return $this->redirect($this->generateUrl('paquete'));
    }

    /**
     * Creates a form to delete a Paquete entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
