<?php

namespace Frontend\ContratosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\ContratosBundle\Entity\Abogados;
use Frontend\ContratosBundle\Form\AbogadosType;

/**
 * Abogados controller.
 *
 */
class AbogadosController extends Controller
{

    /**
     * Lists all Abogados entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ContratosBundle:Abogados')->findAll();

        return $this->render('ContratosBundle:Abogados:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Abogados entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Abogados();
        $form = $this->createForm(new AbogadosType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $entities = $em->getRepository('ContratosBundle:Abogados')->findAll();

            return $this->redirect($this->generateUrl('abogados', array('entities' => $entities)));
        }

        return $this->render('ContratosBundle:Abogados:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Abogados entity.
     *
     */
    public function newAction()
    {
        $entity = new Abogados();
        $form   = $this->createForm(new AbogadosType(), $entity);

        return $this->render('ContratosBundle:Abogados:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Abogados entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContratosBundle:Abogados')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Abogados entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContratosBundle:Abogados:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Abogados entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContratosBundle:Abogados')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Abogados entity.');
        }

        $editForm = $this->createForm(new AbogadosType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContratosBundle:Abogados:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Abogados entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContratosBundle:Abogados')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Abogados entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AbogadosType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            $entities = $em->getRepository('ContratosBundle:Abogados')->findAll();

            return $this->redirect($this->generateUrl('abogados', array('entities' => $entities)));
        }

        return $this->render('ContratosBundle:Abogados:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Abogados entity.
     *
     */
    public function deleteAction( $id)
    {     
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ContratosBundle:Abogados')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Abogados entity.');
        }

        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('abogados'));
    }

    /**
     * Creates a form to delete a Abogados entity by id.
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