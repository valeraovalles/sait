<?php

namespace Frontend\VisitasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\VisitasBundle\Entity\Usuario;
use Frontend\VisitasBundle\Form\UsuarioType;

use Frontend\VisitasBundle\Entity\Visita;
use Frontend\VisitasBundle\Form\VisitaType;

use Frontend\VisitasBundle\Entity\Salida;
use Frontend\VisitasBundle\Form\SalidaType;



/**
 * Usuario controller.
 *
 */
class UsuarioController extends Controller 
{

    /**
     * Lists all Usuario entities.
     *
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();

        $dql   = "SELECT v FROM FrontendVisitasBundle:Visita v join v.usuario u order by v.fechaentrada DESC, v.horaentrada DESC";
        $query = $em->createQuery($dql);
        $query->setMaxResults(1000);
        $entities = $query->getResult(); 



        return $this->render('FrontendVisitasBundle:Usuario:index.html.twig', array(
            'entities' => $entities,
        ));
    }



    /**
     * Creates a new Usuario entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Usuario();
        $form = $this->createForm(new UsuarioType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('usuario_show', array('id' => $entity->getId())));
        }

        return $this->render('FrontendVisitasBundle:Usuario:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }



    /**
     * Displays a form to create a new Usuario entity.
     *
     */
    public function newAction()
    {
        $entity = new Usuario();
        $form   = $this->createForm(new UsuarioType(), $entity);

        return $this->render('FrontendVisitasBundle:Usuario:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }



    /**
     * Finds and displays a Usuario entity.
     *
     */


  public function mostrarAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('FrontendVisitasBundle:Usuario')->find($id);


        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $var=$entity->getUsuario()->getCedula();


        $filename = "/sait/web/libs/photobooth/uploads/original/".$var;

        return $this->render('FrontendVisitasBundle:Usuario:show.html.twig', array(
            'var' => $var,
            'entity'      => $entity,
            'filename' => $filename,
            'delete_form' => $deleteForm->createView(),        ));
    }



    public function showAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('FrontendVisitasBundle:Visita')->find($id);


        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuario entity.');
        }

        $var=$entity->getUsuario()->getCedula();


        $filename = "/sait/web/libs/photobooth/uploads/original/".$var;

        return $this->render('FrontendVisitasBundle:Usuario:show.html.twig', array(
            'var' => $var,
            'entity'      => $entity,
            'filename' => $filename,      ));
    }





/****************************************************************************************************************


    /**
     * Displays a form to edit an existing Usuario entity.
     *
     */
    public function editAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('FrontendVisitasBundle:Visita')->find($id);
        $entityx = $em->getRepository('FrontendVisitasBundle:Usuario')->find($entity->getUsuario()->getId());

 
        $editForm = $this->createForm(new UsuarioType(), $entityx);


        return $this->render('FrontendVisitasBundle:Usuario:edit.html.twig', array(
            'entity'      => $entityx,
            'edit_form'   => $editForm->createView(),
            'visita'=>$entity

        ));
    }



    /**
     * Edits an existing Usuario entity.
     *
     */
    public function updateAction(Request $request, $id)
    {


        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FrontendVisitasBundle:Visita')->find($id);
        $entityx = $em->getRepository('FrontendVisitasBundle:Usuario')->find($entity->getUsuario()->getId());

        if (!$entityx) {
            throw $this->createNotFoundException('Unable to find Usuario entity.');
        }

        $editForm = $this->createForm(new UsuarioType(), $entityx);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entityx);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Actualización exitosa!');

            return $this->redirect($this->generateUrl('usuario_show_control', array('id' => $id)));
        }

        return $this->render('FrontendVisitasBundle:Usuario:edit.html.twig', array(
            'entity'      => $entityx,
            'edit_form'   => $editForm->createView(),
        ));
    }



/****************************************************************************************************************





    /**
     * Determina si un usuario existe en la BD
     *
     */
    public function busquedaAction(Request $request)
    {


        $cedula=0;
        $entity = new Usuario();
        $form   = $this->createForm(new UsuarioType(), $entity);

    if ($request->getMethod()=='POST') 
    {
        $datos=$request->request->all();
        $datos=$datos['frontend_visitasbundle_usuariotype'];
        $cedula = $datos['cedula']; 
        
        if(empty($cedula)){
            return $this->render('FrontendVisitasBundle:Usuario:busqueda.html.twig', array(
                        'entity' => $entity,
                        'form'   => $form->createView(),
                    ));

        }

        $em = $this->getDoctrine()->getManager();
        $dql   = "SELECT u FROM FrontendVisitasBundle:Usuario u where u.cedula= :cedula";
        $query = $em->createQuery($dql);
        $query->setParameter('cedula', $cedula);
        $usuario = $query->getResult(); 


    if ($usuario){
         $form   = $this->createForm(new UsuarioType(), $usuario[0]);
        $filename = "/sait/web/libs/photobooth/uploads/original/".$cedula;

         return $this->render('FrontendVisitasBundle:Usuario:mostar.html.twig', array(
                'entity' => $usuario[0],
                'form'   => $form->createView(),
                'filename' => $filename,
            ));
    }


    else{
        return $this->redirect($this->generateUrl('usuario_registrar_control', array('cedula'=>$cedula)));
    }
          

    }
        $entity = new Usuario();
        $form   = $this->createForm(new UsuarioType(), $entity);

        return $this->render('FrontendVisitasBundle:Usuario:busqueda.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
        
    }



    /**
     * Muestra el formulario para registrar el usuario
     *
     */
    public function registrarAction(Request $request, $cedula){

        $entity = new Usuario();
        $entity->setCedula($cedula);
        $form   = $this->createForm(new UsuarioType(), $entity);
        $entity2 = new Visita();



/*
        $entity = new Usuario();
        $entity->setCedula($cedula);
        $form   = $this->createForm(new UsuarioType(), $entity);
        $entity2 = new Visita();
        $fecha = date_create_from_format('Y-m-d', \date("Y-m-d"));
        $hora = date_create_from_format('Y-m-d', \date("H-i-s"));
        $entity2->setFechaentrada($fecha);
        $entity2->setHoraentrada($hora);

*/


        $form2   = $this->createForm(new VisitaType(), $entity2);

        return $this->render('FrontendVisitasBundle:Usuario:encontrado.html.twig', array(
            'cedula' => $cedula,
            'entity' => $entity,
            'form'   => $form->createView(),
            'entity2' => $entity2,
            'form2'   => $form2->createView(),
        ));

    }



    /*
    * Registra un usuario dentro de la entidad Usuario y lo asocia a la entidad Visita
    *
    */
    public function registranuevavisitaAction(Request $request,$cedula){


        $entity = new Usuario();
        $entity->setCedula($cedula);
        $form   = $this->createForm(new UsuarioType(), $entity);
        $form->bind($request);
        $entity2 = new Visita();
        $form2   = $this->createForm(new VisitaType(), $entity2);
        $form2->bind($request);



        if ($form->isValid() && $form2->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $em->persist($entity);
            $entity2->setUsuario($entity);
            $fecha = date_create_from_format('Y-m-d', \date("Y-m-d"));
            $hora = date_create_from_format('Y-m-d', \date("H-i-s"));
            $entity2->setFechaentrada($fecha);
            $entity2->setHoraentrada($hora);
            $em->persist($entity2);
            $em->flush();
 
            return $this->redirect($this->generateUrl('control_visitas_usuario'));
        }

        return $this->render('FrontendVisitasBundle:Usuario:encontrado.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'entity2' => $entity2,
            'form2'   => $form2->createView(),
            'cedula' => $cedula
        ));

    }


    /*
    * Registra la hora y fecha de salida
    *
    */

    public function salidaAction($id){


        $em = $this->getDoctrine()->getManager();
        $fechasal = date_create_from_format('Y-m-d', \date("Y-m-d"));
        $horasalida = date_create_from_format('Y-m-d', \date("H-i-s"));
        $entityx = $em->getRepository('FrontendVisitasBundle:Visita')->find($id);
        $entityx -> setFechasalida($fechasal);
        $entityx -> setHorasalida($horasalida);
        if (!$entityx) {
            throw $this->createNotFoundException('Unable to find Usuario entity.');
        }

        $em->persist($entityx);
        $em->flush();


        $this->get('session')->getFlashBag()->add('notice', 'Se proceso la salida!');

        return $this->redirect($this->generateUrl('usuario_show_control', array('id' => $id)));

    }


    /*
    * Muestra un formulario con los datos del usuario cargados
    *
    */

    public function usuAction($id)
    {
     

        $em = $this->getDoctrine()->getManager();

        
        $dql = "select v from FrontendVisitasBundle:Visita v where v.usuario= :id order by v.id DESC";
        $query = $em->createQuery($dql);
        $query->setParameter('id',$id);
        $entityx = $query->getResult();
        $entityx = $entityx[0];
        $entity = $em->getRepository('FrontendVisitasBundle:Usuario')->find($entityx->getUsuario()->getId());




        if (!$entity) {
            throw $this->createNotFoundException('Unable to find entity .');
        }


        $editForm = $this->createForm(new UsuarioType(), $entity);

        $entity2 = new Visita();
        $form   = $this->createForm(new VisitaType(), $entity2);




        return $this->render('FrontendVisitasBundle:Usuario:usu.html.twig', array(

            'form'        => $form->createView(),
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'visita'      => $entityx
        ));


    }




    public function usuaAction(Request $request, $id)
    {



        $em = $this->getDoctrine()->getManager();

     //   $fechasal = date_create_from_format('Y-m-d', \date("Y-m-d"));
     //   $horasalida = date_create_from_format('Y-m-d', \date("H-i-s"));

        $entityx = $em->getRepository('FrontendVisitasBundle:Visita')->find($id);
        $entity = $em->getRepository('FrontendVisitasBundle:Usuario')->find($entityx->getUsuario()->getId());

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuario entity USUA.');
        }

        $editForm = $this->createForm(new UsuarioType(), $entity);
        $editForm->bind($request);
        $entity2 = new Visita();
        $form   = $this->createForm(new VisitaType(), $entity2);
        $form->bind($request);

        if ($editForm->isValid() && $form->isValid())  {


            $entity2->setUsuario($entity);
            $fecha = date_create_from_format('Y-m-d', \date("Y-m-d"));
            $hora = date_create_from_format('Y-m-d', \date("H-i-s"));
            $entity2->setFechaentrada($fecha);
            $entity2->setHoraentrada($hora);
            $em->persist($entity);
            $em->persist($entity2);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Se registro una nueva visita!');

            return $this->redirect($this->generateUrl('usuario_show_control', array('id' => $id)));
        }

        return $this->render('FrontendVisitasBundle:Usuario:usu.html.twig', array(
            'form'        => $form->createView(),
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'visita'      => $entityx
        ));


    }











    }//clase  