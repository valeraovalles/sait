<?php

namespace Frontend\AgendaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\AgendaBundle\Entity\Procedencia;
use Frontend\AgendaBundle\Form\ProcedenciaType;

use Frontend\AgendaBundle\Entity\Personalidad;
use Frontend\AgendaBundle\Form\PersonalidadType;

/**
 * Procedencia controller.
 *
 */
class ProcedenciaController extends Controller
{

    /**
     * Lists all Procedencia entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FrontendAgendaBundle:Procedencia')->findAll();

        return $this->render('FrontendAgendaBundle:Procedencia:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Procedencia entity.
     *
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $entity  = new Procedencia();
        $form = $this->createForm(new ProcedenciaType(), $entity);

        $entity1  = new Personalidad();
        $form1 = $this->createForm(new PersonalidadType(), $entity1);

        $form->bind($request);
        $form1->bind($request);

        if ($form->isValid() and $form1->isValid()) {
            
            $em->persist($entity);
            $em->flush();

            $ejec= $entity->getId();

            $ejecu = $em->getRepository('FrontendAgendaBundle:Procedencia')->find($ejec);

            $em->entity1->setIdProcedencia($ejecu);

die;

            $em->persist($entity1);
            $em->flush();



die;

            return $this->redirect($this->generateUrl('procedencia_show', array('id' => $entity->getId())));
        }

        return $this->render('FrontendAgendaBundle:Procedencia:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Procedencia entity.
     *
     */
    public function newAction()
    {
        $entity = new Procedencia();
        $form   = $this->createForm(new ProcedenciaType(), $entity);

        $entity1  = new Personalidad();
        $form1 = $this->createForm(new PersonalidadType(), $entity1);


        return $this->render('FrontendAgendaBundle:Procedencia:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'entity1' => $entity1,
            'form1'   => $form1->createView(),
        ));
    }

    /**
     * Finds and displays a Procedencia entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FrontendAgendaBundle:Procedencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Procedencia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FrontendAgendaBundle:Procedencia:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Procedencia entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FrontendAgendaBundle:Procedencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Procedencia entity.');
        }

        $editForm = $this->createForm(new ProcedenciaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FrontendAgendaBundle:Procedencia:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Procedencia entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FrontendAgendaBundle:Procedencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Procedencia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ProcedenciaType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('procedencia_edit', array('id' => $id)));
        }

        return $this->render('FrontendAgendaBundle:Procedencia:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Procedencia entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FrontendAgendaBundle:Procedencia')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Procedencia entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('procedencia'));
    }

    /**
     * Creates a form to delete a Procedencia entity by id.
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
