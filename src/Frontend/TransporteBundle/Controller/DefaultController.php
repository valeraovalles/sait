<?php

namespace Frontend\TransporteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;


class DefaultController extends Controller
{
    public function indexAction()
    {
    	/* PARA VALIDAR SESION, NO FUNCIONA
    	if (false==$this->get('security.context')->isGranted('IS_AUTHENTICATED_FULL')){
    		return $this->redirect($this->generateUrl('usuario_login'));    		
    	}
    	*/
    	return $this->render('TransporteBundle:Default:index.html.twig');	
    	
        
    }
}
