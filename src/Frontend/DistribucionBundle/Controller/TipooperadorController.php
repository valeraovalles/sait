<?php

namespace Frontend\DistribucionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\DistribucionBundle\Entity\Tipooperador;
use Frontend\DistribucionBundle\Form\TipooperadorType;

/**
 * Tipooperador controller.
 *
 */
class TipooperadorController extends Controller
{
    /**
     * Lists all Tipooperador entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DistribucionBundle:Tipooperador')->findAll();

        return $this->render('DistribucionBundle:Tipooperador:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Tipooperador entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Tipooperador();
        $form = $this->createForm(new TipooperadorType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
            $perfil = $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);
            $entity->setUser($perfil);

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipooperador_show', array('id' => $entity->getId())));
        }

        return $this->render('DistribucionBundle:Tipooperador:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Tipooperador entity.
     *
     */
    public function newAction()
    {
        $entity = new Tipooperador();
        $form   = $this->createForm(new TipooperadorType(), $entity);

        return $this->render('DistribucionBundle:Tipooperador:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tipooperador entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DistribucionBundle:Tipooperador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tipooperador entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DistribucionBundle:Tipooperador:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Tipooperador entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DistribucionBundle:Tipooperador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tipooperador entity.');
        }

        $editForm = $this->createForm(new TipooperadorType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DistribucionBundle:Tipooperador:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Tipooperador entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DistribucionBundle:Tipooperador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tipooperador entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TipooperadorType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
            $perfil = $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);
            $entity->setUser($perfil);

            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Actualización exitosa!');
            return $this->redirect($this->generateUrl('tipooperador_show', array('id' => $id)));
        }

        return $this->render('DistribucionBundle:Tipooperador:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Tipooperador entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DistribucionBundle:Tipooperador')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tipooperador entity.');
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
                $this->get('session')->getFlashBag()->add('alert', 'No se puede eliminar el tipo de operador "'.$entity->getOperador().'" porque se encuentra asociado a un operador.');
            }
        }

        return $this->redirect($this->generateUrl('tipooperador'));
    }

    /**
     * Creates a form to delete a Tipooperador entity by id.
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
