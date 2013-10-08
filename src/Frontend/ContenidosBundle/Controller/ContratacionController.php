<?php

namespace Frontend\ContenidosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\ContenidosBundle\Entity\Contratacion;
use Frontend\ContenidosBundle\Form\ContratacionType;

use Frontend\ContenidosBundle\Entity\presupuesto;
use Frontend\ContenidosBundle\Entity\Datosproveedor;
/**
 * Controlador de la Contrataciones.
 *
 */
class ContratacionController extends Controller
{

    /**
     * Lista todas las Contrataciones asociadas a un presupuesto.
     *
     */
    public function indexAction($id_presupuesto,$id_proveedor,$t)
    {
        $em = $this->getDoctrine()->getManager();
       
        $presupuesto = $em->getRepository('ContenidosBundle:Presupuesto')->findByDescripcion($id_presupuesto);

        if ($t == 0)
        {
           $entities = $em->getRepository('ContenidosBundle:Contratacion')->findByidPresupuesto($id_presupuesto);
        }else if ($t == 1)
        {
            $entities = $em->getRepository('ContenidosBundle:Contratacion')->findByidPresupuesto($presupuesto);        
        }

        return $this->render('ContenidosBundle:Contratacion:index.html.twig', array(
            'entities' => $entities,
            'id_presupuesto' => $id_presupuesto,
            'id_proveedor' => $id_proveedor,
            'pres' => $presupuesto,
        ));
    }
    /**
     * Crear una nueva Contratacion.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Contratacion();
        $form = $this->createForm(new ContratacionType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('contratacion_show', array('id' => $entity->getId())));
        }

        return $this->render('ContenidosBundle:Contratacion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Formulario para crear una Contratacion.
     *
     */
    public function newAction($id_presupuesto,$id_proveedor)
    {
        $entity = new Contratacion();
        $form   = $this->createForm(new ContratacionType(), $entity);
        $t = 1;

        $em = $this->getDoctrine()->getManager();
       

echo $id_proveedor;


        $entity3 = $em->getRepository('ContenidosBundle:Datosproveedor')->findByNombre($id_proveedor);
        $tipoprov= $entity3->getIdTipoproveedor();

die;





echo $tipoprov;
die;

        return $this->render('ContenidosBundle:Contratacion:new.html.twig', array(
            'entity' => $entity,
            'id_proveedor' => $id_proveedor,
            'id_presupuesto' => $id_presupuesto,
            'tipoprov' => $tipoprov,
            't'=>$t,
            'form'   => $form->createView(),
        ));

    }

    /**
     * Detalles de una Contratacion.
     *
     */
    public function showAction($id_presupuesto,$id, $id_proveedor)
    {
        
        $em = $this->getDoctrine()->getManager();

        $entity1 = $em->getRepository('ContenidosBundle:Contratacion')->find($id);


        $pres= $entity1->getIdPresupuesto();


        $entity2 = $em->getRepository('ContenidosBundle:Presupuesto')->find($pres);
        $prov = $entity2-> getIdProveedor();

        $entity3 = $em->getRepository('ContenidosBundle:Datosproveedor')->find($prov);
        $tipoprov= $entity3->getIdTipoprov();


        $t = 1;
        $entity = $em->getRepository('ContenidosBundle:Contratacion')->find($id);


        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contratacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContenidosBundle:Contratacion:show.html.twig', array(
            'entity'      => $entity,
            'id_presupuesto' => $id_presupuesto,
            'id_proveedor' => $id_proveedor,
            'prov'        => $prov,
            't'           => $t,
            'delete_form' => $deleteForm->createView(),  ));
    }

    /**
     * Formulario mpara editar una Contratacion.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

       
        $entity = $em->getRepository('ContenidosBundle:Contratacion')->find($id);
        $pres= $entity->getIdPresupuesto();

        $entity2 = $em->getRepository('ContenidosBundle:Presupuesto')->find($pres);
        $prov = $entity2-> getIdProveedor();

        $entity3 = $em->getRepository('ContenidosBundle:Datosproveedor')->find($prov);
        $tipoprov= $entity3->getIdTipoprov();

        $t = 1;

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contratacion entity.');
        }

        $editForm = $this->createForm(new ContratacionType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContenidosBundle:Contratacion:edit.html.twig', array(
            'entity'      => $entity,
            'tipoprov'    => $tipoprov,
            'prov'        => $prov,
            'pres'        => $pres,
            't'           => $t,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Actualizar la Contratacion.
     *
     */
    public function updateAction(Request $request, $id, $id_presupuesto)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ContenidosBundle:Contratacion')->find($id);

        $t = 1;

        $pres= $entity->getIdPresupuesto();

        $presupuesto = $em->getRepository('ContenidosBundle:Presupuesto')->find($pres);
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contratacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ContratacionType(), $entity);
        $editForm->bind($request);

            $entity-> setIdPresupuesto($presupuesto);

            $em->persist($entity);

            $em->flush();
            return $this->redirect($this->generateUrl('contratacion_edit', array(
                                                                                    'id' => $id, 
                                                                                    't'  => $t,)));  
    }
    /**
     * Eliminar  una Contratacion.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ContenidosBundle:Contratacion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Contratacion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('contratacion'));
    }

    /**
     * Creates a form to delete a Contratacion entity by id.
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
