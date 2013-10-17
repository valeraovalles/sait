<?php

namespace Frontend\SitBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\SitBundle\Entity\Subcategoria;
use Frontend\SitBundle\Form\SubcategoriaType;

use Frontend\SitBundle\Entity\Categoria;
/**
 * Subcategoria controller.
 *
 */
class SubcategoriaController extends Controller
{

    /**
     * Lists all Subcategoria entities.
     *
     */
    public function indexAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $dql = "select s from SitBundle:Subcategoria s join s.categoria c where c.id= :id";
        $query = $em->createQuery($dql);
        $query->setParameter('id',$id);
        $entities = $query->getResult();
        if(empty($entities))$entities=null;

        return $this->render('SitBundle:Subcategoria:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Subcategoria entity.
     *
     */
    public function createAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $categoria=$em->getRepository('SitBundle:Categoria')->find($id);

        $entity  = new Subcategoria();
        $form = $this->createForm(new SubcategoriaType($id), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'La subcategoria se creó con exito.');
            return $this->redirect($this->generateUrl('subcategoria', array('id' => $entity->getCategoria()->getId())));
        }

        return $this->render('SitBundle:Subcategoria:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'categoria'=>$categoria,

        ));
    }

    /**
     * Displays a form to create a new Subcategoria entity.
     *
     */
    public function newAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $categoria=$em->getRepository('SitBundle:Categoria')->find($id);

        $entity = new Subcategoria();
        $form   = $this->createForm(new SubcategoriaType($id), $entity);

        return $this->render('SitBundle:Subcategoria:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'categoria'=>$categoria
        ));
    }

    /**
     * Finds and displays a Subcategoria entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SitBundle:Subcategoria')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Subcategoria entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SitBundle:Subcategoria:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Subcategoria entity.
     *
     */
    public function editAction($idsub, $idcat)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SitBundle:Subcategoria')->find($idsub);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Subcategoria entity.');
        }

        $editForm = $this->createForm(new SubcategoriaType($idcat), $entity);
        $deleteForm = $this->createDeleteForm($idsub);

        return $this->render('SitBundle:Subcategoria:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'idcat'=>$idcat
        ));
    }

    /**
     * Edits an existing Subcategoria entity.
     *
     */
    public function updateAction(Request $request, $idsub,$idcat)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SitBundle:Subcategoria')->find($idsub);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Subcategoria entity.');
        }

        $deleteForm = $this->createDeleteForm($idsub);
        $editForm = $this->createForm(new SubcategoriaType($idcat), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'La subcategoria se actualizó con exito.');
            return $this->redirect($this->generateUrl('subcategoria_edit', array('idsub' => $idsub,'idcat'=>$idcat)));
        }

        return $this->render('SitBundle:Subcategoria:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'idcat'=>$idcat
        ));
    }
    /**
     * Deletes a Subcategoria entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SitBundle:Subcategoria')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Subcategoria entity.');
            }

            $em->remove($entity);
            $em->flush();
        }
        $this->get('session')->getFlashBag()->add('notice', 'La subcategoria '.$entity->getSubcategoria().' se eliminó con exito.');
        return $this->redirect($this->generateUrl('subcategoria',array('id' => $entity->getCategoria()->getId())));
    }

    /**
     * Creates a form to delete a Subcategoria entity by id.
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
