<?php

namespace Frontend\ConstanciaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\ConstanciaBundle\Entity\Constancia;
use Frontend\ConstanciaBundle\Form\ConstanciaType;
use Administracion\UsuarioBundle\Resources\Misclases\Conexion;
use Administracion\UsuarioBundle\Resources\Misclases\Funcion;
use Frontend\ConstanciaBundle\Resources\Misclases\htmlreporte;

/**
 * Constancia controller.
 *
 */
class ConstanciaController extends Controller
{

    public function pdfAction($id)
    {


        $parametros['directora']=$this->container->getParameter('directora');
        $parametros['montoticket']=$this->container->getParameter('montoticket');
        $em = $this->getDoctrine()->getManager();
        
        $constancia = $em->getRepository('ConstanciaBundle:Constancia')->find($id);
        $usuario = $em->getRepository('UsuarioBundle:Perfil')->find($constancia->getUser()->getId());
        $f=new Funcion;
        $datosnomina=$f->datosUsuarioSigefirrhh($usuario->getCedula());

        //$fc=new funciones;
        
        
        
        $a=new htmlreporte;
        $html=$a->constancia($em,$constancia,$usuario,$datosnomina,$parametros);
        //echo $html;
        //die;

        //GENERO EL PDF
        include("libs/MPDF/mpdf.php");
        $mpdf=new \mPDF();

        //$mpdf->AddPage('L','','','','',25,25,55,45,18,12);
        $stylesheet = file_get_contents('bundles/constancia/pdfconstancia.css');
        $mpdf->WriteHTML($stylesheet,1);    // The parameter 1 tells that this is css/style only and no body/html/text
 
        $mpdf->WriteHTML($html);
        $mpdf->Output($usuario->getPrimerNombre().' '.$usuario->getPrimerapellido().' '.strtoupper($constancia->getTipo()).".pdf","D");
        exit;


        die;

    }
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ConstanciaBundle:Constancia')->findAll();

        return $this->render('ConstanciaBundle:Constancia:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Constancia entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Constancia();
        $form = $this->createForm(new ConstanciaType(), $entity);
        $form->bind($request);

        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $usuario = $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);

        $f=new Funcion;
        $datosnomina=$f->datosUsuarioSigefirrhh($usuario->getCedula());


        if ($form->isValid()) {

            $str = \date("Y-m-d G:i:s");
            $fechaactual = \DateTime::createFromFormat('Y-m-d G:i:s', $str);

            $em = $this->getDoctrine()->getManager();
            $entity->setUser($usuario);
            $entity->setFechasolicitud($fechaactual);
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Constancia solicitada exitosamente.');
            return $this->redirect($this->generateUrl('constancia_homepage'));
        }

        return $this->render('ConstanciaBundle:Constancia:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'usuario' => $usuario,
            'datosnomina' => $datosnomina
        ));
    }

    /**
     * Displays a form to create a new Constancia entity.
     *
     */
    public function newAction()
    {

        $bloquea=true;
        if(date('N')==1 || date('N')==2){
            $bloquea=false;
        }

        if($bloquea==true){

            return $this->redirect($this->generateUrl('constancia_homepage'));
        }

        $entity = new Constancia();
        $form   = $this->createForm(new ConstanciaType(), $entity);

        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $usuario = $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);

        $f=new Funcion;
        $datosnomina=$f->datosUsuarioSigefirrhh($usuario->getCedula());
        
        return $this->render('ConstanciaBundle:Constancia:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'datosnomina' => $datosnomina
        ));
    }

    /**
     * Finds and displays a Constancia entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ConstanciaBundle:Constancia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Constancia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        $f=new Funcion;
        $datosnomina=$f->datosUsuarioSigefirrhh($entity->getUser()->getCedula());


        return $this->render('ConstanciaBundle:Constancia:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(), 
            'datosnomina'=>$datosnomina
            ));
    }

    /**
     * Displays a form to edit an existing Constancia entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ConstanciaBundle:Constancia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Constancia entity.');
        }

        $editForm = $this->createForm(new ConstanciaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $f=new Funcion;
        $datosnomina=$f->datosUsuarioSigefirrhh($entity->getUser()->getCedula());

        return $this->render('ConstanciaBundle:Constancia:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'datosnomina'=>$datosnomina
        ));
    }

    /**
     * Edits an existing Constancia entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ConstanciaBundle:Constancia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Constancia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ConstanciaType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add('alert', 'Datos actualizados.');
            return $this->redirect($this->generateUrl('constancia_show', array('id' => $id)));
        }


        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $usuario = $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);

        $f=new Funcion;
        $datosnomina=$f->datosUsuarioSigefirrhh($usuario->getCedula());

        return $this->render('ConstanciaBundle:Constancia:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'datosnomina'=>$datosnomina
        ));
    }
    /**
     * Deletes a Constancia entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ConstanciaBundle:Constancia')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Constancia entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        $this->get('session')->getFlashBag()->add('alert', 'Datos actualizados.');
        return $this->redirect($this->generateUrl('constancia'));
    }

    /**
     * Creates a form to delete a Constancia entity by id.
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
