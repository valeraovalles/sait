<?php

namespace Administracion\UsuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Doctrine\ORM\Mapping as ORM;
use Administracion\UsuarioBundle\Resources\Misclases\Funcion;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class DefaultController extends Controller
{
    public function indexAction()
    {
        
       
        /*     return new Response(
            'Created perfil id: '.$perfil->getId().' and user id: '.$user->getId()
        );*/
        
        //VERIFICAR SI EL USUARIO ESTA LOGUEADO
        if (false === $this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
          throw new AccessDeniedException();
        }

        $IdUsuario = $this->get('security.context')->getToken()->getUser()->getId();
            
        $em = $this->getDoctrine()->getManager();
        $consulta= $em->createQuery('SELECT p FROM UsuarioBundle:Perfil p
        JOIN p.user u
        WHERE u.id = :userid
        ');
        $consulta->setParameter('userid', $IdUsuario);
        $usuario = $consulta->getSingleResult();
        
        $f=new Funcion;
        $datos_usuario=$f->datosUsuarioSigefirrhh(17312612);
        
        
        return $this->render('UsuarioBundle:Default:index.html.twig', array('usuario'=>$usuario,'datos'=>$datos_usuario)
        );
    }
    public function loginAction()
    {
        $peticion = $this->getRequest();
        $sesion = $peticion->getSession();
        $error = $peticion->attributes->get(
        SecurityContext::AUTHENTICATION_ERROR,
        $sesion->get(SecurityContext::AUTHENTICATION_ERROR)
        );
        
        
        return $this->render('UsuarioBundle:Default:login.html.twig', array(
        'last_username' => $sesion->get(SecurityContext::LAST_USERNAME),
        'error'
        => $error
        ));
    }

    public function sincronizacionAction()
    {
        return $this->render('UsuarioBundle:Default:sincronizacion.html.twig');
    }
}
