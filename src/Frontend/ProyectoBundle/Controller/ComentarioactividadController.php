<?php

namespace Frontend\ProyectoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\ProyectoBundle\Entity\Comentarioactividad;
use Frontend\ProyectoBundle\Form\ComentarioactividadType;

/**
 * Comentarioactividad controller.
 *
 */
class ComentarioactividadController extends Controller
{

    /**
     * Lists all Comentarioactividad entities.
     *
     */
    public function indexAction($idactividad)
    {
        $em = $this->getDoctrine()->getManager();

        $act = $em->getRepository('ProyectoBundle:Actividad')->find($idactividad);
        $entities = $em->getRepository('ProyectoBundle:Comentarioactividad')->findByActividad($idactividad,array('id'=>'DESC'));

        return $this->render('ProyectoBundle:Comentarioactividad:index.html.twig', array(
            'entities' => $entities,
            'act'=>$act
        ));
    }
    
    public function generalAction($idactividad)
    {
        $em = $this->getDoctrine()->getManager();

        $act = $em->getRepository('ProyectoBundle:Actividad')->find($idactividad);
        $entities = $em->getRepository('ProyectoBundle:Comentarioactividad')->findByActividad($idactividad);

        return $this->render('ProyectoBundle:Comentarioactividad:general.html.twig', array(
            'entities' => $entities,
            'act'=>$act
        ));
    }
    /**
     * Creates a new Comentarioactividad entity.
     *
     */
    public function createAction(Request $request,$idactividad)
    {
        $em = $this->getDoctrine()->getManager();
        $act = $em->getRepository('ProyectoBundle:Actividad')->find($idactividad);
        
        $entity = new Comentarioactividad();
        $form = $this->createCreateForm($entity,$idactividad);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
            $perfil = $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);
            
            $entity->setResponsable($perfil);
            $entity->setActividad($act);
            $entity->setFechahora(new \DateTime(\date("d-m-Y G:i:s")));
            
            $em->persist($entity);
            $em->flush();

            $responsable=$act->getTarea()->getProyecto()->getResponsable();
            foreach ($responsable as $v) {
                $arrayresponsable[]=$v->getUser()->getUsername()."@telesurtv.net";
            }
            
            $arrayresponsable[]=$act->getResponsable()->getUser()->getUsername()."@telesurtv.net";
            
            $message = \Swift_Message::newInstance()   
            ->setSubject('Proyectos-Comentario')  
            ->setFrom($perfil->getNivelorganizacional()->getCorreo())     // we configure the sender
            ->setTo($arrayresponsable)   
            ->setBody( $this->renderView(
                    'ProyectoBundle:Correo:comentario.html.twig',
                    array('comentario'=>$entity)
                ), 'text/html');

            $this->get('mailer')->send($message);   
            
            
            return $this->redirect($this->generateUrl('comentarioactividad', array('idactividad' => $idactividad)));
        }

        return $this->render('ProyectoBundle:Comentarioactividad:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'act'=>$act
        ));
    }
    
    public function creategeneralAction(Request $request,$idactividad)
    {
        $em = $this->getDoctrine()->getManager();
        $act = $em->getRepository('ProyectoBundle:Actividad')->find($idactividad);
        
        $entity = new Comentarioactividad();
        $form = $this->createCreateForm($entity,$idactividad);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
            $perfil = $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);
            
            $entity->setResponsable($perfil);
            $entity->setActividad($act);
            $entity->setFechahora(new \DateTime(\date("d-m-Y G:i:s")));
            
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('comentarioactividad_general', array('idactividad' => $idactividad)));
        }

        return $this->render('ProyectoBundle:Comentarioactividad:newgeneral.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'act'=>$act
        ));
    }

    /**
     * Creates a form to create a Comentarioactividad entity.
     *
     * @param Comentarioactividad $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Comentarioactividad $entity,$idactividad)
    {
        $form = $this->createForm(new ComentarioactividadType(), $entity, array(
            'action' => $this->generateUrl('comentarioactividad_create',array('idactividad'=>$idactividad)),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Comentarioactividad entity.
     *
     */
    public function newAction($idactividad)
    {
        $em = $this->getDoctrine()->getManager();
        $act = $em->getRepository('ProyectoBundle:Actividad')->find($idactividad);
        $entity = new Comentarioactividad();
        
        $form   = $this->createCreateForm($entity,$idactividad);

        return $this->render('ProyectoBundle:Comentarioactividad:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'act'=>$act
        ));
    }
    
    public function newgeneralAction($idactividad)
    {
        $em = $this->getDoctrine()->getManager();
        $act = $em->getRepository('ProyectoBundle:Actividad')->find($idactividad);
        $entity = new Comentarioactividad();
        
        $form   = $this->createCreateForm($entity,$idactividad);

        return $this->render('ProyectoBundle:Comentarioactividad:newgeneral.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'act'=>$act
        ));
    }

    /**
     * Finds and displays a Comentarioactividad entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProyectoBundle:Comentarioactividad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comentarioactividad entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProyectoBundle:Comentarioactividad:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Comentarioactividad entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProyectoBundle:Comentarioactividad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comentarioactividad entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProyectoBundle:Comentarioactividad:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Comentarioactividad entity.
    *
    * @param Comentarioactividad $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Comentarioactividad $entity)
    {
        $form = $this->createForm(new ComentarioactividadType(), $entity, array(
            'action' => $this->generateUrl('comentarioactividad_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Comentarioactividad entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProyectoBundle:Comentarioactividad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comentarioactividad entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('comentarioactividad_edit', array('id' => $id)));
        }

        return $this->render('ProyectoBundle:Comentarioactividad:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Comentarioactividad entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProyectoBundle:Comentarioactividad')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Comentarioactividad entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('comentarioactividad'));
    }

    /**
     * Creates a form to delete a Comentarioactividad entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('comentarioactividad_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
