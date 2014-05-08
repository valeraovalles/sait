<?php

namespace Frontend\TransporteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Administracion\UsuarioBundle\Entity\Perfil;
use Administracion\UsuarioBundle\Entity\User;

use Frontend\TransporteBundle\Entity\Solicitudes;
use Frontend\TransporteBundle\Form\SolicitudesType;
use Doctrine\ORM\EntityRepository;

/**
 * Solicitudes controller.
 *
 */
class SolicitudesController extends Controller
{

    /**
     * Lists all Solicitudes entities.
     *
     */
    public function indexAction($accion="none") //All por defecto
    {
        $em = $this->getDoctrine()->getManager();
        if ($accion=="none"){
            $entities = $em->getRepository('TransporteBundle:Solicitudes')->findAll();
        }
        if ($accion=="Apro"){
            $entities = $em->getRepository('TransporteBundle:Solicitudes')->findByEstatus("N");
        }
        if ($accion=="Culm"){
            $entities = $em->getRepository('TransporteBundle:Solicitudes')->findByEstatus("AP");
        }     
        
        return $this->render('TransporteBundle:Solicitudes:index.html.twig', array(
            'entities' => $entities,
            'accion' => $accion
        ));
    }
    /**
     * Creates a new Solicitudes entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Solicitudes();
        $form = $this->createForm(new SolicitudesType(), $entity);
        $form->bind($request);

        //$fsol=$this->get('request')->request->get('fechaSolicitud');
        //echo $fsol; exit;             
        
        //$datos = $form->getData();
        //print_r($datos); exit;
        //$entity->setFechaSolicitud('05-05-2014');
        
     
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
            $usuario = $em->getRepository('UsuarioBundle:User')->find($idusuario);
            $entity->setIdSolicitante($usuario);

            $str = \date("Y-m-d");
            $fechaactual = \DateTime::createFromFormat('Y-m-d', $str);                        
            $entity->setFechaSolicitud($fechaactual);

            $entity->setEstatus("N");
            //$entity->setjustificacionRechazo();
        
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('solicitudes_show', array('id' => $entity->getId())));
        }
        return $this->render('TransporteBundle:Solicitudes:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Solicitudes entity.
     *
     */
    public function newAction()
    {
        $entity = new Solicitudes();
        $form   = $this->createForm(new SolicitudesType(), $entity);
        //NO SE USARA LA LISTA DE USUARIOS PARA EL SOLICITANTE
        //$em = $this->getDoctrine()->getManager();           
        //$usuarios= $em->getRepository('UsuarioBundle:Perfil')->findAll();

        return $this->render('TransporteBundle:Solicitudes:new.html.twig', array(
            'entity' => $entity,
          //  'usuarios' => $usuarios,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Solicitudes entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TransporteBundle:Solicitudes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Solicitudes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TransporteBundle:Solicitudes:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Solicitudes entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TransporteBundle:Solicitudes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('La solicitud consultada no existe.');
        }

        $editForm = $this->createForm(new SolicitudesType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TransporteBundle:Solicitudes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Solicitudes entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TransporteBundle:Solicitudes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Solicitudes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new SolicitudesType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('solicitudes_edit', array('id' => $id)));
        }

        return $this->render('TransporteBundle:Solicitudes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Solicitudes entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TransporteBundle:Solicitudes')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Solicitudes entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('solicitudes'));
    }

    /**
     * Creates a form to delete a Solicitudes entity by id.
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

     public function statusAction($id, $accion)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TransporteBundle:Solicitudes')->find($id);
        $entity->setEstatus($accion);
        $em->persist($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('solicitudes_show', array('id' => $id)));
                
    }
}
