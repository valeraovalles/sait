<?php

namespace Frontend\LicenciasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\LicenciasBundle\Entity\Licencias;
use Frontend\LicenciasBundle\Form\LicenciasType;

/**
 * Licencias controller.
 *
 */
class LicenciasController extends Controller
{
    /**
     * Lists all Licencias entities.
     *
     */
    public function indexAction()
    {
        $retorno= 'licencias_homepage';
        $em = $this->getDoctrine()->getManager();
        $dql = 'select l.id, l.nombre, l.codigo, l.fechaCompra, l.fechaVencimiento, l.descripcion from LicenciasBundle:Licencias l 
                order by l.id ASC ';
        $consulta = $em->createQuery($dql);
        $entities = $consulta->getResult();


        return $this->render('LicenciasBundle:Licencias:index.html.twig', array(
            'entities' => $entities,
            'retorno' => $retorno
        ));
    }
    /**
     * Creates a new Licencias entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Licencias();
        $form = $this->createForm(new LicenciasType(), $entity);
        $form->bind($request);

        if ($form->isValid()) 
        {
            $retorno='licencias_homepage';
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('licencias_show', array('id' => $entity->getId(), 
                                                                               'retorno'=>$retorno
                                                                             )));
        }

        return $this->render('LicenciasBundle:Licencias:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Licencias entity.
     *
     */
    public function newAction()
    {
        $entity = new Licencias();
        $form   = $this->createForm(new LicenciasType(), $entity);

        return $this->render('LicenciasBundle:Licencias:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Licencias entity.
     *
     */
     public function showAction($id,$retorno)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LicenciasBundle:Licencias')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Licencias entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LicenciasBundle:Licencias:show.html.twig', array(
            'entity'      => $entity,
            'retorno'     => $retorno,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Licencias entity.
     *
     */
    public function editAction($id,$retorno)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LicenciasBundle:Licencias')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Licencias entity.');
        }

        $editForm = $this->createForm(new LicenciasType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LicenciasBundle:Licencias:edit.html.twig', array(
            'entity'      => $entity,
            'retorno'     => $retorno,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Licencias entity.
     *
     */
     public function updateAction(Request $request, $id, $retorno)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LicenciasBundle:Licencias')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Licencias entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new LicenciasType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) 
        {
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('licencias_edit', 
                  array(
                                          'id' => $id,
                                           'retorno'=>$retorno
                        )));
        }
        return $this->render('LicenciasBundle:Licencias:edit.html.twig', array(
            'entity'      => $entity,
            'retorno'     => $retorno,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Licencias entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LicenciasBundle:Licencias')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Licencias entity.');
        }
            $em->remove($entity);
            $em->flush();

            $entities = $em->getRepository('LicenciasBundle:Licencias')->findAll();
            $retorno='licencias_homepage';

           return $this->redirect($this->generateUrl('licencias_homepage', array('entities' => $entities, 
                                                                               'retorno'=>$retorno
                                                                             )));
        
    }


    /**
     * Creates a form to delete a Licencias entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }

    public function vencidasAction()
    {   
        $retorno= 'licencias_vencidas';
        $hoy =date("Y-m-d", time());
        $em = $this->getDoctrine()->getManager();
        $dql = 'select l.id, l.nombre, l.codigo, l.fechaCompra, l.fechaVencimiento, l.descripcion from LicenciasBundle:Licencias l 
                where l.fechaVencimiento < :hoy order by l.id ASC ';
        $consulta = $em->createQuery($dql)->setParameter('hoy', $hoy);
        $entities = $consulta->getResult();

        return $this->render('LicenciasBundle:Licencias:vencidas.html.twig',
                                array(
                                          'entities' => $entities,
                                           'retorno'=>$retorno
                                     )
                            );
    }

    public function porvencerAction()
    {
        $retorno='licencias_por_vencer';
        $hoy = date("Y-m-d", time());
        $mes_siguiente = date('Y-m-d', strtotime('+8 week'));
        $em = $this->getDoctrine()->getManager();
        $dql = 'select l.id, l.nombre, l.codigo, l.fechaCompra, l.fechaVencimiento, l.descripcion from LicenciasBundle:Licencias l 
                where l.fechaVencimiento  between :hoy and :dos_meses order by l.id ASC ';
        $consulta = $em->createQuery($dql)->setParameters(
                                                            array(
                                                                    'hoy' => $hoy, 
                                                                    'dos_meses' => $mes_siguiente
                                                                 )
                                                         );
        $entities = $consulta->getResult();
        return $this->render('LicenciasBundle:Licencias:porvencer.html.twig',
                                array(
                                          'entities' => $entities,
        //                                'pagination' =>$pagination
                                           'retorno'=>$retorno
                                     )
                            );
    }

}
