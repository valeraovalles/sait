<?php

namespace Frontend\ContenidosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\ContenidosBundle\Entity\Banco;
use Frontend\ContenidosBundle\Form\BancoType;

/**
 * Banco controller.
 *
 */
class BancoController extends Controller
{

    /**
     * Lists all Banco entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ContenidosBundle:Banco')->findAll();

        return $this->render('ContenidosBundle:Banco:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Banco entity.
     *
     */
    public function createAction(Request $request)
    {

        $entity  = new Banco();
        $form = $this->createForm(new BancoType(), $entity);
        $form->bind($request);
            

            $id_p = '1';
            
        
            $em = $this->getDoctrine()->getManager();
            $entity->setIdProveedor($id_p);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('banco_show', array('id' => $entity->getId())));    
    }

    /**
     * Displays a form to create a new Banco entity.
     *
     */
    public function newAction()
    {
        $entity = new Banco();
        $form   = $this->createForm(new BancoType(), $entity);

        return $this->render('ContenidosBundle:Banco:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Banco entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:Banco')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Banco entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContenidosBundle:Banco:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Banco entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:Banco')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Banco entity.');
        }

        $editForm = $this->createForm(new BancoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContenidosBundle:Banco:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Banco entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:Banco')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Banco entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new BancoType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('banco_edit', array('id' => $id)));
        }

        return $this->render('ContenidosBundle:Banco:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Banco entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ContenidosBundle:Banco')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Banco entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('banco'));
    }

    /**
     * Creates a form to delete a Banco entity by id.
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
