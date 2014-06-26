<?php

namespace Frontend\TransporteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\TransporteBundle\Entity\Asignaciones;
use Frontend\TransporteBundle\Form\AsignacionesType;

/**
 * Asignaciones controller.
 *
 */
class AsignacionesController extends Controller
{

    /**
     * Lists all Asignaciones entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TransporteBundle:Asignaciones')->findAll();

        return $this->render('TransporteBundle:Asignaciones:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Asignaciones entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Asignaciones();
        $form = $this->createForm(new AsignacionesType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $str = \date("Y-m-d");
            $fechaactual = \DateTime::createFromFormat('Y-m-d', $str);                        
            $entity->setFechaAsignacion($fechaactual);                          
            $em->persist($entity);
            $em->flush();

            //Llamamos al action status del controlador solicitudes para actualizar el status
            return $this->redirect($this->generateUrl('solicitudes_status', array('id' => $entity->getIdSolicitud()->getId(), 'accion'=>'AP')));
            //return $this->redirect($this->generateUrl('asignaciones_show', array('id' => $entity->getId())));
        }

        return $this->render('TransporteBundle:Asignaciones:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Asignaciones entity.
     *
     */
    public function newAction()
    {
        $entity = new Asignaciones();
        $form   = $this->createForm(new AsignacionesType(), $entity);

        return $this->render('TransporteBundle:Asignaciones:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Asignaciones entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TransporteBundle:Asignaciones')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Asignaciones entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TransporteBundle:Asignaciones:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }
    
    public function showSolicitudAction($idSolicitud)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TransporteBundle:Asignaciones')->findByIdSolicitud($idSolicitud);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Asignaciones entity.');
        }

        

        return $this->render('TransporteBundle:Asignaciones:showSolicitud.html.twig', array(
            'entity'      => $entity,            
            
            ));
    }

    /**
     * Displays a form to edit an existing Asignaciones entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TransporteBundle:Asignaciones')->find($id);
        $idSol=$entity->getIdSolicitud()->getId();

        $entity_sol = $em->getRepository('TransporteBundle:Solicitudes')->find($id);
        $stat=$entity_sol->getEstatus();
        
        if ($stat=="C"){
            $this->get('session')->getFlashBag()->add('alert', 'LA SOLICITUD YA FUE CERRADA/CULMINADA');
            return $this->render('TransporteBundle:Asignaciones:show.html.twig', array(
            'entity'      => $entity,                        
            ));
        }
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Asignaciones entity.');
        }

        $editForm = $this->createForm(new AsignacionesType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TransporteBundle:Asignaciones:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Asignaciones entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TransporteBundle:Asignaciones')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Asignaciones entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AsignacionesType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('asignaciones_edit', array('id' => $id)));
        }

        return $this->render('TransporteBundle:Asignaciones:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Asignaciones entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TransporteBundle:Asignaciones')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Asignaciones entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('asignaciones'));
    }

    /**
     * Creates a form to delete a Asignaciones entity by id.
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
