<?php

namespace Frontend\ProyectoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\ProyectoBundle\Entity\Comentario;
use Frontend\ProyectoBundle\Form\ComentarioType;

/**
 * Comentario controller.
 *
 */
class ComentarioController extends Controller
{
    /**
     * Lists all Comentario entities.
     *
     */
    public function indexAction($proyecto)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProyectoBundle:Comentario')->findByProyectoId($proyecto);

        $cont = 0;
        $entities= array();
        $i = 0;
        foreach ($entity as $key) 
        {
            $id[$key->getId()]=$key->getId();
            $entities[$i]['id'] = $id[$key->getId()];

            $fecha[$key->getId()]=$key->getFechaRegistro();
            $entities[$i]['fechaRegistro'] = $fecha[$key->getId()];

            $proyect[$key->getId()]=$key->getProyectoId();
            $entities[$i]['proyecto'] = $proyect[$key->getId()];

            $comn[$key->getId()]=$key->getComentario();
            $entities[$i]['comentario'] = $comn[$key->getId()];

            $cont ++;
            $i++;
        }

        return $this->render('ProyectoBundle:Comentario:index.html.twig', array(
            'entities'  => $entities,    
            'proyecto'  => $proyecto,
            'cont'      => $cont,
        ));
    }
    /**
     * Creates a new Comentario entity.
     *
     */
    public function createAction(Request $request, $proyecto)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = new Comentario();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $proyectoId = $em->getRepository('ProyectoBundle:Proyecto')->find($proyecto);
            $hoy = date_create_from_format('Y-m-d H:m:i', \date("Y-m-d H:m:i"));

            $entity->setProyectoId($proyectoId);
            $entity->setFechaRegistro($hoy);

            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('notice', 'Se Creó el comentario satisfactoriamente');
            return $this->redirect($this->generateUrl('comentarioproyecto_show', array('id' => $entity->getId())));
        }

        return $this->render('ProyectoBundle:Comentario:new.html.twig', array(
            'entity' => $entity,
            'proyecto'  => $proyecto,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Comentario entity.
     *
     * @param Comentario $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Comentario $entity)
    {
        $form = $this->createForm(new ComentarioType(), $entity, array(
            'action' => $this->generateUrl('comentarioproyecto_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Comentario entity.
     *
     */
    public function newAction($proyecto)
    {        
        $entity = new Comentario();
        $form   = $this->createCreateForm($entity);

        return $this->render('ProyectoBundle:Comentario:new.html.twig', array(
            'entity' => $entity,
            'proyecto'=> $proyecto,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Comentario entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProyectoBundle:Comentario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comentario entity.');
        }
        $proyecto = $entity->getProyectoId()->getId();
       
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProyectoBundle:Comentario:show.html.twig', array(
            'entity'      => $entity,
            'proyecto'    => $proyecto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Comentario entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProyectoBundle:Comentario')->find($id);
        $proyecto = $entity->getProyectoId()->getId();

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comentario entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProyectoBundle:Comentario:edit.html.twig', array(
            'entity'      => $entity,
            'proyecto'    => $proyecto,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Comentario entity.
    *
    * @param Comentario $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Comentario $entity)
    {
        $form = $this->createForm(new ComentarioType(), $entity, array(
            'action' => $this->generateUrl('comentarioproyecto_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Comentario entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProyectoBundle:Comentario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comentario entity.');
        }

        $proyect = $entity->getProyectoId()->getId();
        $proyectId = $em->getRepository('ProyectoBundle:Proyecto')->find($proyect);
        $fechaRegistro = $entity->getFechaRegistro();


        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {

            $entity->setFechaRegistro($fechaRegistro);
            $entity->setProyectoId($proyectId);

            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Se modificó el comentario satisfactoriamente');
            return $this->render('ProyectoBundle:Comentario:show.html.twig', array(
            'entity'      => $entity,
            'proyecto'    => $proyect,
            'delete_form' => $deleteForm->createView(),
        ));
        }

        return $this->render('ProyectoBundle:Comentario:edit.html.twig', array(
            'entity'      => $entity,
            'proyecto'    => $proyect,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Comentario entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProyectoBundle:Comentario')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Comentario entity.');
            }

            $proyecto = $entity->getProyectoId()->getId();

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('comentarioproyecto', array('proyecto' => $proyecto)));
    }

    /**
     * Creates a form to delete a Comentario entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('comentarioproyecto_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
