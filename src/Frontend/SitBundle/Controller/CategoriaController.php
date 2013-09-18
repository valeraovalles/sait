<?php

namespace Frontend\SitBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\SitBundle\Entity\Categoria;
use Frontend\SitBundle\Form\CategoriaType;

/**
 * Categoria controller.
 *
 */
class CategoriaController extends Controller
{

    /**
     * Lists all Categoria entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        //traigo los datos del usuario conectado
        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        $usuariounidad =  $em->getRepository('SitBundle:Unidad')->unidadusuario($idusuario);

        $dql = "select c from SitBundle:Categoria c join c.unidad u where u.id= :id";
        $query = $em->createQuery($dql);
        $query->setParameter('id',$usuariounidad[0]->getId());
        $entities = $query->getResult();

        //$entities = $em->getRepository('SitBundle:Categoria')->findAll();
        return $this->render('SitBundle:Categoria:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Categoria entity.
     *
     */
    public function createAction(Request $request)
    {


        $em = $this->getDoctrine()->getManager();
        //traigo los datos del usuario conectado
        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        $usuariounidad =  $em->getRepository('SitBundle:Unidad')->unidadusuario($idusuario);

        $entity  = new Categoria();
        $form = $this->createForm(new CategoriaType($usuariounidad[0]->getId()), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'La categoria fue creada con exito.');
            return $this->redirect($this->generateUrl('categoria'));
        }

        return $this->render('SitBundle:Categoria:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Categoria entity.
     *
     */
    public function newAction()
    {

        $em = $this->getDoctrine()->getManager();
        //traigo los datos del usuario conectado
        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        $usuariounidad =  $em->getRepository('SitBundle:Unidad')->unidadusuario($idusuario);

        $entity = new Categoria();
        $form   = $this->createForm(new CategoriaType($usuariounidad[0]->getId()), $entity);

        return $this->render('SitBundle:Categoria:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Categoria entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SitBundle:Categoria')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Categoria entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SitBundle:Categoria:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Categoria entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        //traigo los datos del usuario conectado
        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        $usuariounidad =  $em->getRepository('SitBundle:Unidad')->unidadusuario($idusuario);

        $entity = $em->getRepository('SitBundle:Categoria')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Categoria entity.');
        }

        $editForm = $this->createForm(new CategoriaType($usuariounidad[0]->getId()), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SitBundle:Categoria:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Categoria entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        //traigo los datos del usuario conectado
        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        $usuariounidad =  $em->getRepository('SitBundle:Unidad')->unidadusuario($idusuario);

        $entity = $em->getRepository('SitBundle:Categoria')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Categoria entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new CategoriaType($usuariounidad[0]->getId()), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('notice', 'La categoria se actualizó con exito.');
            return $this->redirect($this->generateUrl('categoria_edit', array('id' => $id)));
        }

        return $this->render('SitBundle:Categoria:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Categoria entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('SitBundle:Categoria')->find($id);

        $dql = "select s from SitBundle:Subcategoria s join s.categoria c where c.id= :id";
        $query = $em->createQuery($dql);
        $query->setParameter('id',$id);
        $entities = $query->getResult();

        if(!empty($entities)){
            $this->get('session')->getFlashBag()->add('alert', 'No se peude eliminar la categoria '.$entity->getCategoria().' porque tiene subcategorias aociadas.');
            return $this->redirect($this->generateUrl('categoria'));
        }


        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Categoria entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('categoria'));
    }

    /**
     * Creates a form to delete a Categoria entity by id.
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
