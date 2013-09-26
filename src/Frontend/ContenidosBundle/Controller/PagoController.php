<?php

namespace Frontend\ContenidosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\ContenidosBundle\Entity\Pago;
use Frontend\ContenidosBundle\Entity\Datosproveedor;
use Frontend\ContenidosBundle\Form\PagoType;

/**
 * Pago controller.
 *
 */
class PagoController extends Controller
{

    /**
     * Lists all Pago entities.
     *
     */
    public function indexAction($id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ContenidosBundle:Pago')->findByIdContratacion($id_proveedor);

        return $this->render('ContenidosBundle:Pago:index.html.twig', array(
            'entities' => $entities,
            'id_proveedor' => $id_proveedor,
        ));
    }
    /**
     * Creates a new Pago entity.
     *
     */
    public function createAction(Request $request,$id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ContenidosBundle:Datosproveedor')->findBynombre($id_proveedor);

echo $id_proveedor;



$id = 2;
        $entity  = new Pago();

        $form = $this->createForm(new PagoType(), $entity);

        $form->bind($request);

        
            $em = $this->getDoctrine()->getManager();

            $entity->setidProveedor($id);
die;
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('pago_show', array('id' => $entity->getId(),
                                                                         'id_proveedor' => $id_proveedor,
                                                                        )));
    }

    /**
     * Displays a form to create a new Pago entity.
     *
     */
    public function newAction($id_proveedor)
    {
        $entity = new Pago();
        $form   = $this->createForm(new PagoType(), $entity);

        return $this->render('ContenidosBundle:Pago:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'id_proveedor' => $id_proveedor,
        ));
    }

    /**
     * Finds and displays a Pago entity.
     *
     */
    public function showAction($id,$id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:Pago')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pago entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContenidosBundle:Pago:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        
            'id_proveedor' => $id_proveedor,
            ));
    }

    /**
     * Displays a form to edit an existing Pago entity.
     *
     */
    public function editAction($id,$id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:Pago')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pago entity.');
        }

        $editForm = $this->createForm(new PagoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContenidosBundle:Pago:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'id_proveedor' => $id_proveedor,
        ));
    }

    /**
     * Edits an existing Pago entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:Pago')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pago entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PagoType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('pago_edit', array('id' => $id)));
        }

        return $this->render('ContenidosBundle:Pago:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Pago entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ContenidosBundle:Pago')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Pago entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('pago'));
    }

    /**
     * Creates a form to delete a Pago entity by id.
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
