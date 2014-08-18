<?php

namespace Frontend\ProyectoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\ProyectoBundle\Entity\Tarea;
use Frontend\ProyectoBundle\Form\TareaType;

/**
 * Tarea controller.
 *
 */
class TareaController extends Controller
{

    
    public function fechainicioproyecto($idproyecto){

        $em = $this->getDoctrine()->getManager();
        
        //busco la fecha mas baja de las tareas para que sea la fecha de inicio del proyecto
        $dql = "select x from ProyectoBundle:Tarea x where x.proyecto= :idproyecto order by x.fechainicio ASC";
        $query = $em->createQuery($dql);
        $query->setParameter('idproyecto',$idproyecto);
        $query->setMaxResults(1);
        $tarea = $query->getResult();
        
        if(!empty($tarea))
            $fechainicio=$tarea[0]->getFechainicio();
        else $fechainicio=null;
        

        //actualizo campos en ticket
        $query = $em->createQuery('update ProyectoBundle:Proyecto x set x.fechainicio= :fechainicio WHERE x.id = :idproyecto');
        $query->setParameter('fechainicio', $fechainicio);
        $query->setParameter('idproyecto', $idproyecto);
        $query->execute();
    }
    
    /**
     * Lists all Tarea entities.
     *
     */
    public function indexAction($idproyecto)
    {
        $em = $this->getDoctrine()->getManager();
        $proyecto = $em->getRepository('ProyectoBundle:Proyecto')->find($idproyecto);       
        $entities = $em->getRepository('ProyectoBundle:Tarea')->findAll();
        return $this->render('ProyectoBundle:Tarea:index.html.twig', array(
            'entities' => $entities,
            'proyecto' => $proyecto,
        ));
    }
    /**
     * Creates a new Tarea entity.
     *
     */
    public function createAction(Request $request,$idproyecto)
    {
        $em = $this->getDoctrine()->getManager();
        $proyecto = $em->getRepository('ProyectoBundle:Proyecto')->find($idproyecto);
        
        $entity = new Tarea();
        $form = $this->createCreateForm($entity,$idproyecto);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->setPorcentaje(0);
            $entity->setEstatus(1);
            $entity->setProyecto($proyecto);
            $em->persist($entity);
            $em->flush();

            $this->fechainicioproyecto($idproyecto);
            
            return $this->redirect($this->generateUrl('tarea_show', array('id' => $entity->getId())));
        }

        return $this->render('ProyectoBundle:Tarea:new.html.twig', array(
            'entity' => $entity,
            'proyecto' => $proyecto,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Tarea entity.
     *
     * @param Tarea $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Tarea $entity,$idproyecto)
    {
        $form = $this->createForm(new TareaType(), $entity, array(
            'action' => $this->generateUrl('tarea_create',array('idproyecto'=>$idproyecto)),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tarea entity.
     *
     */
    public function newAction($idproyecto)
    {
        $em = $this->getDoctrine()->getManager();
        $proyecto = $em->getRepository('ProyectoBundle:Proyecto')->find($idproyecto);
        
        $entity = new Tarea();
        $form   = $this->createCreateForm($entity,$idproyecto);

        return $this->render('ProyectoBundle:Tarea:new.html.twig', array(
            'entity' => $entity,
            'proyecto' => $proyecto,
            'form'   => $form->createView(),
        ));
    }
    

    /**
     * Finds and displays a Tarea entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ProyectoBundle:Tarea')->find($id);
        $proyecto = $em->getRepository('ProyectoBundle:Proyecto')->find($entity->getProyecto()->getId());

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tarea entity.');
        }
        $deleteForm = $this->createDeleteForm($id,$entity->getProyecto()->getId());

        return $this->render('ProyectoBundle:Tarea:show.html.twig', array(
            'entity'      => $entity,
            'proyecto'      => $proyecto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Tarea entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProyectoBundle:Tarea')->find($id);
        $proyecto = $em->getRepository('ProyectoBundle:Proyecto')->find($entity->getProyecto()->getId());

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tarea entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id,$entity->getProyecto()->getId());

        return $this->render('ProyectoBundle:Tarea:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'proyecto'=>$proyecto
        ));
    }

    /**
    * Creates a form to edit a Tarea entity.
    *
    * @param Tarea $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tarea $entity)
    {
        $form = $this->createForm(new TareaType(), $entity, array(
            'action' => $this->generateUrl('tarea_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tarea entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProyectoBundle:Tarea')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tarea entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            $this->fechainicioproyecto($entity->getProyecto()->getId());
            return $this->redirect($this->generateUrl('tarea_show', array('id' => $id)));
        }

        return $this->render('ProyectoBundle:Tarea:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tarea entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ProyectoBundle:Tarea')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tarea entity.');
        }
        

        $form = $this->createDeleteForm($id,$entity->getProyecto()->getId());
        $form->handleRequest($request);

        if ($form->isValid()) {



            $em->remove($entity);
            $em->flush();
            
            $this->fechainicioproyecto($entity->getProyecto()->getId());
        }

        return $this->redirect($this->generateUrl('tarea',array('idproyecto' => $entity->getProyecto()->getId())));
    }

    /**
     * Creates a form to delete a Tarea entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id,$idproyecto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tarea_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'BORRAR'))
            ->getForm()
        ;
    }
}
