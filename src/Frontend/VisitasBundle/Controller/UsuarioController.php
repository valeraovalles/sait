<?php

namespace Frontend\VisitasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\VisitasBundle\Entity\Usuario;
use Frontend\VisitasBundle\Form\UsuarioType;

use Frontend\VisitasBundle\Entity\Visita;
use Frontend\VisitasBundle\Form\VisitaType;



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

        $entities = $em->getRepository('FrontendVisitasBundle:Usuario')->findAll();
        $entities2= $em->getRepository('FrontendVisitasBundle:Visita')->findAll();

        return $this->render('FrontendVisitasBundle:Usuario:index.html.twig', array(
            'entities' => $entities,
            'entities2'=> $entities2,
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
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FrontendVisitasBundle:Usuario')->find($id);
        $entity2= $em->getRepository('FrontendVisitasBundle:Visita')->findAll($fechaentrada);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        $var=$entity->getCedula();

        $filename = "/sait/web/libs/photobooth/uploads/original/".$var;
        echo '<td><img src='.$filename.'></td></tr>';


        return $this->render('FrontendVisitasBundle:Usuario:show.html.twig', array(
            'entity'      => $entity,
            'entity2'     => $entity2,
            'delete_form' => $deleteForm->createView(),        ));


    }

    /**
     * Displays a form to edit an existing Usuario entity.
     *
     */

    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FrontendVisitasBundle:Usuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuario entity.');
        }

        $editForm = $this->createForm(new UsuarioType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FrontendVisitasBundle:Usuario:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Usuario entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FrontendVisitasBundle:Usuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new UsuarioType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('usuario_edit_control', array('id' => $id)));
        }

        return $this->render('FrontendVisitasBundle:Usuario:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Usuario entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FrontendVisitasBundle:Usuario')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Usuario entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('usuario'));
    }

    /**
     * Creates a form to delete a Usuario entity by id.
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

    /**
     * Determina si un usuario existe en la BD
     *
     */
    public function busquedaAction(Request $request)
    {


        $cedula=0;
    if ($request->getMethod()=='POST') 
    {
        $datos=$request->request->all();
        $datos=$datos['frontend_visitasbundle_usuariotype'];
        $cedula = $datos['cedula']; 


        $em = $this->getDoctrine()->getManager();

        $dql   = "SELECT u FROM FrontendVisitasBundle:Usuario u where u.cedula= :cedula";
        $query = $em->createQuery($dql);
        $query->setParameter('cedula', $cedula);
        $usuario = $query->getResult(); 



    if ($usuario){
         $form   = $this->createForm(new UsuarioType(), $usuario[0]);


         return $this->render('FrontendVisitasBundle:Usuario:show.html.twig', array(
                'entity' => $usuario[0],
                'form'   => $form->createView(),
            ));



    }



    else{
        return $this->redirect($this->generateUrl('usuario_registrar_control'));

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
     * Registra un usuario dentro de la entidad Usuario y lo asocia a la entidad Visita
     *
     */
    public function registrarAction(Request $request){

        $entity = new Usuario();
        $form   = $this->createForm(new UsuarioType(), $entity);
        $entity2 = new Visita();
        $form2   = $this->createForm(new VisitaType(), $entity2);


        return $this->render('FrontendVisitasBundle:Usuario:encontrado.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'entity2' => $entity2,
            'form2'   => $form2->createView(),
        ));

    }
/*
*
*
*/


    public function registranuevavisitaAction(Request $request){

        $entity = new Usuario();
        $form   = $this->createForm(new UsuarioType(), $entity);
        $form->bind($request);
        $entity2 = new Visita();
        $form2   = $this->createForm(new VisitaType(), $entity2);
        $form2->bind($request);


        if ($form->isValid() && $form2->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $em->persist($entity);
            $entity2->setUsuario($entity);
            $em->persist($entity2);
            $em->flush();
 
            return $this->redirect($this->generateUrl('control_visitas_usuario'));
        }

        return $this->render('FrontendVisitasBundle:Usuario:encontrado.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'entity2' => $entity2,
            'form2'   => $form2->createView(),
        ));





    }




    public function agregarnuevavisitaAction(){




    }








    }//clase






