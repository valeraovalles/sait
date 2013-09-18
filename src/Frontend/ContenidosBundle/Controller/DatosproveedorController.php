<?php

namespace Frontend\ContenidosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\ContenidosBundle\Entity\Datosproveedor;
use Frontend\ContenidosBundle\Form\DatosproveedorType;

/**
 * Datosproveedor controller.
 *
 */
class DatosproveedorController extends Controller
{

    /**
     * Lists all Datosproveedor entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $titulo = "COMPLETO DE PROVEEDORES";

        $entities = $em->getRepository('ContenidosBundle:Datosproveedor')->findAll();

        return $this->render('ContenidosBundle:Datosproveedor:index.html.twig', array(
            'entities' => $entities,
            'titulo' => $titulo,
        ));
    }

    public function comprasAction()
    {
        $em = $this->getDoctrine()->getManager();
        $titulo = "PROVEEDORES DE COMPRAS";

        $id_tipoproveedor = 1;
        $dql = "select d from ContenidosBundle:Datosproveedor d where d.idTipoprov=:id_tipoproveedor";
        $consulta = $em->createQuery($dql)->setParameter('id_tipoproveedor', $id_tipoproveedor);
        $entities = $consulta->getResult();
        return $this->render('ContenidosBundle:Datosproveedor:index.html.twig', array(
            'entities' => $entities,
            'titulo' => $titulo,
        ));
    }

    public function informacionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $id_tipoproveedor = 2;
        $titulo = "PROVEEDORES DE INFORMACION";

        $dql = "select d from ContenidosBundle:Datosproveedor d where d.idTipoprov=:id_tipoproveedor";
        $consulta = $em->createQuery($dql)->setParameter('id_tipoproveedor', $id_tipoproveedor);
        $entities = $consulta->getResult();
        return $this->render('ContenidosBundle:Datosproveedor:index.html.twig', array(
            'entities' => $entities,
            'titulo' => $titulo,
        ));
    }

    public function equiposAction()
    {
        $em = $this->getDoctrine()->getManager();
        $id_tipoproveedor = 4;

        $titulo = "DE EQUIPOS TELESUR";
        $dql = "select d from ContenidosBundle:Datosproveedor d where d.idTipoprov=:id_tipoproveedor";
        $consulta = $em->createQuery($dql)->setParameter('id_tipoproveedor', $id_tipoproveedor);
        $entities = $consulta->getResult();
        return $this->render('ContenidosBundle:Datosproveedor:index.html.twig', array(
            'entities' => $entities,
            'titulo' => $titulo,
        ));
    }

    public function satelitesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $id_tipoproveedor = 3;
        $titulo = "PROVEEDORES DE SATELITES";
        $dql = "select d from ContenidosBundle:Datosproveedor d where d.idTipoprov=:id_tipoproveedor";
        $consulta = $em->createQuery($dql)->setParameter('id_tipoproveedor', $id_tipoproveedor);
        $entities = $consulta->getResult();
        return $this->render('ContenidosBundle:Datosproveedor:index.html.twig', array(
            'entities' => $entities,
            'titulo' => $titulo,
        ));
    }

    /**
     * Creates a new Datosproveedor entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Datosproveedor();
        $form = $this->createForm(new DatosproveedorType(), $entity);
        $form->bind($request);


            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('datosproveedor_show', array('id' => $entity->getId())));
        
    }

    /**
     * Displays a form to create a new Datosproveedor entity.
     *
     */
    public function newAction()
    {
        $entity = new Datosproveedor();
        $form   = $this->createForm(new DatosproveedorType(), $entity);

        return $this->render('ContenidosBundle:Datosproveedor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Datosproveedor entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:Datosproveedor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Datosproveedor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContenidosBundle:Datosproveedor:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Datosproveedor entity.
     *
     */
    public function editAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:Datosproveedor')->find($id);
    
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Datosproveedor entity.');
        }

        $editForm = $this->createForm(new DatosproveedorType(), $entity);

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContenidosBundle:Datosproveedor:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Datosproveedor entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:Datosproveedor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Datosproveedor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new DatosproveedorType(), $entity);
        $editForm->bind($request);

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('datosproveedor_edit', array('id' => $id)));
        
    }
    /**
     * Deletes a Datosproveedor entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ContenidosBundle:Datosproveedor')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Datosproveedor entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('datosproveedor'));
    }

    /**
     * Creates a form to delete a Datosproveedor entity by id.
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
