<?php

namespace Administracion\UsuarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Administracion\UsuarioBundle\Entity\User;
use Administracion\UsuarioBundle\Form\UserType;

use Administracion\UsuarioBundle\Entity\Perfil;
use Administracion\UsuarioBundle\Form\PerfilType;

use Administracion\UsuarioBundle\Entity\Cambioclave;
use Administracion\UsuarioBundle\Form\CambioclaveType;

/**
 * User controller.
 *
 */
class UserController extends Controller
{
    /**
     * Lists all User entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UsuarioBundle:Perfil')->findAll();

        return $this->render('UsuarioBundle:User:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    public function notificarAction(Request $request)
    {
        $datos=$request->request->all();
        $datos=$datos['form'];

        $message = \Swift_Message::newInstance()     // we create a new instance of the Swift_Message class
            ->setSubject('CLAVE INTRANET')     // we configure the title
            ->setFrom('intranet@telesurtv.net')     // we configure the sender
            ->setTo("aplicaciones@telesurtv.net")     // we configure the recipient
            ->setBody("
                <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
                El usuario ".$datos['nombre']." ".$datos['apellido']." de cédula ".$datos['cedula']." y extensión ".$datos['extension']." tiene la siguiente solicitud: ".$datos['comentario']."

            ", 'text/html');

            $this->get('mailer')->send($message);     // then we send the message.
            //FIN CORREO
            $this->get('session')->getFlashBag()->add('notice', 'Se ha enviado un correo a la Unidad de Aplicaciones y Desarrollo, pronto nos comunicaremos contigo!!');
            return $this->redirect($this->generateUrl('usuario_login'));

    }
    public function cambioclaveAction()
    {
        $IdUsuario = $this->get('security.context')->getToken()->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('UsuarioBundle:Perfil')->find($IdUsuario);

        if($entity->getUser()->getPassword()==null){
            return $this->redirect($this->generateUrl('usuario_homepage'));
        }

        $entity = new Cambioclave();
        $form   = $this->createForm(new CambioclaveType(), $entity);

        return $this->render('UsuarioBundle:User:cambioclave.html.twig', array(
            'form' => $form->createView(),        ));
    }

    public function actualizacambioclaveAction(Request $request)
    {

        $entity = new Cambioclave();
        $form   = $this->createForm(new CambioclaveType(), $entity);
        $form->bind($request);
        
        if ($form->isValid() ) {

            //valido
            $datos=$request->request->all();
            $datos=$datos['cambioclave'];
            
            $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);


            if(md5($datos['claveanterior'])!=$entity->getUser()->getPassword()){
                $this->get('session')->getFlashBag()->add('alert', 'Su clave actual no coincide.');
                return $this->render('UsuarioBundle:User:cambioclave.html.twig', array(
                'form' => $form->createView(),        ));
            }
            
     
            if(md5($datos['clavenueva'])!=md5($datos['claveconfirmacion'])){
                $this->get('session')->getFlashBag()->add('alert', 'Su clave nueva y de confirmación no coinciden.');
                return $this->render('UsuarioBundle:User:cambioclave.html.twig', array(
                'form' => $form->createView(),        ));
            }

            if(md5($datos['clavenueva'])==md5($datos['claveanterior'])){
                $this->get('session')->getFlashBag()->add('alert', 'Su clave nueva no debe ser igual a la anterior.');
                return $this->render('UsuarioBundle:User:cambioclave.html.twig', array(
                'form' => $form->createView(),        ));
            }
            //fin validar
            
            //desactivo operador
            $consulta = $em->createQuery('update UsuarioBundle:User u set u.password= :pass WHERE u.id = :iduser');
            $consulta->setParameter('iduser', $idusuario);
            $consulta->setParameter('pass', md5($datos['clavenueva']));
            $consulta->execute();
            
            $this->get('session')->getFlashBag()->add('notice', 'Su clave fue actualizada correctamente!!.');
            return $this->redirect($this->generateUrl('usuario_homepage'));
        }
        $this->get('session')->getFlashBag()->add('alert', 'Hay conflictos en el formulario, por favor verifique!!');
        return $this->render('UsuarioBundle:User:cambioclave.html.twig', array(
            'form' => $form->createView(),        ));
    }

    /**
     * Finds and displays a User entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        //$entity = $em->getRepository('UsuarioBundle:User')->find($id);

        
        $em = $this->getDoctrine()->getManager();
        $usuarios= $em->createQuery('SELECT p FROM UsuarioBundle:Perfil p
        JOIN p.user u
        WHERE u.id = :userid
        ');
        $usuarios->setParameter('userid', $id);
        $entity = $usuarios->getSingleResult();

        
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UsuarioBundle:User:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new User entity.
     *
     */
    public function newAction()
    {
        $entity = new User();
        $form   = $this->createForm(new UserType(), $entity);
        
        $perfil = new Perfil();
        $form_perfil   = $this->createForm(new PerfilType(), $perfil);

        return $this->render('UsuarioBundle:User:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            
            'perfil' => $perfil,
            'form_perfil'   => $form_perfil->createView(),
        ));
    }

    /**
     * Creates a new User entity.
     *
     */
    public function createAction(Request $request)
    {

        $entity  = new User();
        $form = $this->createForm(new UserType(), $entity);
        $form->bind($request);
        
        $entity_perfil  = new Perfil();
        $form_perfil = $this->createForm(new PerfilType(), $entity_perfil);
        $form_perfil->bind($request);

        
        if ($form->isValid() && $form_perfil->isValid()) {
            
            //CODIFICO LA CONTRASEÑA
            $factory = $this->get('security.encoder_factory');
            $encoder = $factory->getEncoder($entity);
            $password = $encoder->encodePassword($entity->getPassword(), $entity->getSalt());
            $entity->setPassword($password);
        
            //AGREGO EL ID DEL USUARIO PARA EL PERFIL
            $entity_perfil->setUser($entity);
            
            //GUARDO LOS DATOS
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->persist($entity_perfil);
            $em->flush();
            
            return $this->redirect($this->generateUrl('user_show', array('id' => $entity->getId())));
        }

        return $this->render('UsuarioBundle:User:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            
            'entity_perfil' => $entity_perfil,
            'form_perfil'   => $form_perfil->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing User entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UsuarioBundle:User')->find($id);
        
        $usuarios= $em->createQuery('SELECT p FROM UsuarioBundle:Perfil p
        WHERE p.user = :userid
        ');
        $usuarios->setParameter('userid', $id);
        $entity_perfil = $usuarios->getSingleResult();

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $editForm = $this->createForm(new UserType(), $entity);
        $editFormPerfil = $this->createForm(new PerfilType(), $entity_perfil);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UsuarioBundle:User:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'edit_form_perfil'   => $editFormPerfil->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing User entity.
     *
     */
    public function updateAction(Request $request, $id)
    {

        $datos=$request->request->all();
        $datos=$datos['administracion_usuariobundle_usertype'];

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UsuarioBundle:User')->find($id);
        $passviejo=$entity->getPassword();

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new UserType(), $entity);
        $editForm->bind($request);
        
        
        $usuarios= $em->createQuery('SELECT p FROM UsuarioBundle:Perfil p WHERE p.user = :userid');
        $usuarios->setParameter('userid', $id);
        $entity_perfil = $usuarios->getSingleResult();
        $editFormPerfil = $this->createForm(new PerfilType(), $entity_perfil);
        $editFormPerfil->bind($request);

        if ($editForm->isValid() && $editFormPerfil->isValid()) {
            
             if(!empty($datos['password'])){
                //CODIFICO LA CONTRASEÑA
                $factory = $this->get('security.encoder_factory');
                $encoder = $factory->getEncoder($entity);
                $password = $encoder->encodePassword($entity->getPassword(), $entity->getSalt());
                $entity->setPassword($password);
            } else{

                $entity->setPassword($passviejo);
            }
            
            $em->persist($entity);
            $em->persist($entity_perfil);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Actualización exitosa!');

            return $this->redirect($this->generateUrl('user_show', array('id' => $entity->getId())));
        }

        return $this->render('UsuarioBundle:User:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'edit_form_perfil'   => $editFormPerfil->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a User entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UsuarioBundle:User')->find($id);
            
            $usuarios= $em->createQuery('SELECT p FROM UsuarioBundle:Perfil p WHERE p.user = :userid');
            $usuarios->setParameter('userid', $id);
            $entity_perfil = $usuarios->getSingleResult();

            if (!$entity_perfil) {
                throw $this->createNotFoundException('Unable to find User entity.');
            }
            
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find User entity.');
            }

            $em->remove($entity_perfil);
            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('user'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
    

}
