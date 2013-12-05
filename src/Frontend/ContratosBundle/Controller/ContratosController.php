<?php

namespace Frontend\ContratosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\ContratosBundle\Entity\Contratos;
use Frontend\ContratosBundle\Form\ContratosType;

/**
 * Contratos controller.
 *
 */
class ContratosController extends Controller
{

    /**
     * Lists all Contratos entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ContratosBundle:Contratos')->findAll();

        return $this->render('ContratosBundle:Contratos:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Contratos entity.
     *
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $entity  = new Contratos();
        $form = $this->createForm(new ContratosType(), $entity);
        $form->bind($request);

        $dql   = "SELECT cont FROM ContratosBundle:Contratos cont";
        $query = $em->createQuery($dql);
        $cant_contratos=$query->getResult();

        $cont= 0;
        foreach ($cant_contratos as $key) {
            $prese[$key->getId()]=$key->getCodigo();
            $cont = $cont+1;
        }
        $cont = $cont + 1;
        $anio_actual =  date("Y");
        $direccion = $entity->getIdDireccion();

        if($cont < 10 )
        {
            $codigo = "CJ/0".$cont."/".$anio_actual."/".$direccion;
        }else
        {
            $codigo = "CJ/".$cont."/".$anio_actual."/".$direccion;
        }

        

        $entity->setCodigo($codigo);

        $hoy = date_create_from_format('Y-m-d', \date("Y-m-d"));
        $entity->setFechaRegistro($hoy);

        if ($form->isValid()) {

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('contratos_show', array('id' => $entity->getId())));
        }

        return $this->render('ContratosBundle:Contratos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Contratos entity.
     *
     */
    public function newAction()
    {
        $entity = new Contratos();
        $form   = $this->createForm(new ContratosType(), $entity);

        return $this->render('ContratosBundle:Contratos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Contratos entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContratosBundle:Contratos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contratos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContratosBundle:Contratos:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Contratos entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContratosBundle:Contratos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contratos entity.');
        }

        $editForm = $this->createForm(new ContratosType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContratosBundle:Contratos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Contratos entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContratosBundle:Contratos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contratos entity.');
        }


        $codigo = $entity->getCodigo();
        $fechareg = $entity->getFechaRegistro();

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ContratosType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {

            $entity->setCodigo($codigo);
            $entity->setFechaRegistro($fechareg);

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('contratos_show', array('id' => $entity->getId())));
        }

        return $this->render('ContratosBundle:Contratos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

        /**
     * Creates a new Contratos entity.
     *
     */
    public function createpasadosAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $entity  = new Contratos();
        $form = $this->createForm(new ContratosType(), $entity);
        $form->bind($request);

        if ($form->isValid()) 
        {
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('contratos_show', array('id' => $entity->getId())));
        }

        return $this->render('ContratosBundle:Contratos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Contratos entity.
     *
     */
    public function newpasadosAction()
    {

        $entity = new Contratos();
        $form   = $this->createForm(new ContratosType(), $entity);

        return $this->render('ContratosBundle:Contratos:newpasados.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }





    /**
     * Deletes a Contratos entity.
     *
     */
    public function deleteAction($id)
    {
        
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ContratosBundle:Contratos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contratos entity.');
        }

        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('contratos'));
    }

    /**
     * Creates a form to delete a Contratos entity by id.
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
