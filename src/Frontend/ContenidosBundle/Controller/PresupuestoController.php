<?php

namespace Frontend\ContenidosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\ContenidosBundle\Entity\Presupuesto;
use Frontend\ContenidosBundle\Form\PresupuestoType;

/**
 * Presupuesto controller.
 *
 */
class PresupuestoController extends Controller
{

    /**
     * Lists all Presupuesto entities.
     *
     */
    public function indexAction($id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();

        $tipo = 'N';
        $t = 0;
        $dql = "select p from ContenidosBundle:Presupuesto p 
                where p.idProveedor=:id_proveedor and p.tipo=:tipo";


        $consulta = $em->createQuery($dql)->setParameters(
                                                            array(
                                                                    'id_proveedor'=> $id_proveedor, 
                                                                    'tipo' => $tipo,
                                                                 )
                                                         );
        
        $entities = $consulta->getResult();

        return $this->render('ContenidosBundle:Presupuesto:index.html.twig', array(
            'id_proveedor' => $id_proveedor,
            't' => $t,
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Presupuesto entity.
     *
     */
    public function createAction(Request $request,$id_proveedor)
    {
        $entity  = new Presupuesto();
        $form = $this->createForm(new PresupuestoType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('presupuesto_show', array('id' => $entity->getId())));
        }

        return $this->render('ContenidosBundle:Presupuesto:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Presupuesto entity.
     *
     */
    public function newAction($id_proveedor)
    {
        $entity = new Presupuesto();
        $form   = $this->createForm(new PresupuestoType(), $entity);

        return $this->render('ContenidosBundle:Presupuesto:new.html.twig', array(
            'entity' => $entity,
            'id_proveedor' => $id_proveedor,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Presupuesto entity.
     *
     */
    public function showAction($id,$id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:Presupuesto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Presupuesto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContenidosBundle:Presupuesto:show.html.twig', array(
            'entity'      => $entity,
            'id_proveedor' => $id_proveedor,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Presupuesto entity.
     *
     */
    public function editAction($id,$id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();


        $entity = $em->getRepository('ContenidosBundle:Presupuesto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Presupuesto entity.');
        }

        $editForm = $this->createForm(new PresupuestoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContenidosBundle:Presupuesto:edit.html.twig', array(
            'entity'      => $entity,
            'id_proveedor' =>$id_proveedor,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Presupuesto entity.
     *
     */
    public function updateAction(Request $request,$id,$id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:Presupuesto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Presupuesto entity.');
        }
        $tipo = 'N';
        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PresupuestoType(), $entity);
        $editForm->bind($request);

        $id_prov = $em->getRepository('ContenidosBundle:Datosproveedor')->find($id_proveedor);

        $entity->setIdProveedor($id_prov);
        $entity->setTipo($tipo);

        $em->persist($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('presupuesto_edit', array(
                                                                             'id' => $id,
                                                                             'id_proveedor' => $id_proveedor
                                                                            )));
    }
    /**
     * Deletes a Presupuesto entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ContenidosBundle:Presupuesto')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Presupuesto entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('presupuesto'));
    }


#########################################################################################################
#########################################################################################################
#
#                                       EXTENSION DE PRESUPUESTO
#
#########################################################################################################
#########################################################################################################





    public function extensionindexAction($id_presupuesto,$id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();

        $tipo = 'E';

        $dql = "select p from ContenidosBundle:Presupuesto p 
                where p.tipo=:tipo and p.idPresext=:id_presupuesto";
        $consulta = $em->createQuery($dql)->setParameters(
                                                            array(
                                                                    'id_presupuesto'=> $id_presupuesto, 
                                                                    'tipo' => $tipo,
                                                                 )



                                                         );
        $entities = $consulta->getResult();
        
    return $this->render('ContenidosBundle:Presupuesto:indexextension.html.twig', array(
            'entities' => $entities,
            'id_presupuesto'=>$id_presupuesto,
            'id_proveedor'=>$id_proveedor,
        ));

    }

    public function extensionshowAction($id, $id_presupuesto,$id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:Presupuesto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Presupuesto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContenidosBundle:Presupuesto:showextension.html.twig', array(
            'entity'      => $entity,
            'id_proveedor' => $id_proveedor,
            'id_presupuesto' => $id_presupuesto,
            'delete_form' => $deleteForm->createView(),        ));

    }

    public function extensioneditAction($id, $id_presupuesto, $id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:Presupuesto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Presupuesto entity.');
        }

        $editForm = $this->createForm(new PresupuestoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContenidosBundle:Presupuesto:editextension.html.twig', array(
            'entity'      => $entity,
            'id_proveedor' =>$id_proveedor,
            'id_presupuesto' => $id_presupuesto,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function extensionupdateAction(Request $request, $id, $id_presupuesto,$id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:Presupuesto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Presupuesto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PresupuestoType(), $entity);
        $editForm->bind($request);

        $tipo= 'E';

        $id_prov = $em->getRepository('ContenidosBundle:Datosproveedor')->find($id_proveedor);


        $entity->setTipo($tipo);
        $entity->setIdPresext($id_presupuesto);

        $entity->setIdProveedor($id_prov);
        
        $em->persist($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('presupuesto_extensionedit', array(
                                                  'id' => $id,
                                                  'id_presupuesto' => $id_presupuesto,
                                                  'id_proveedor' => $id_proveedor,
                                                                                        )));

    }

    public function extensionnewAction($id_presupuesto,$id_proveedor)
    {

    }

    public function extensioncreateAction(Request $request,$id_presupuesto, $id_proveedor)
    {

    }

    /**
     * Creates a form to delete a Presupuesto entity by id.
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
