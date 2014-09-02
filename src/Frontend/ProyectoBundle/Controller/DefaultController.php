<?php

namespace Frontend\ProyectoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        if ($this->get('security.context')->isGranted('ROLE_PROYECTO_GENERAL')) {
            return $this->redirect($this->generateUrl('proyecto_general'));
        }
        else if ($this->get('security.context')->isGranted('ROLE_PROYECTO')) {
            return $this->redirect($this->generateUrl('proyecto'));
        }
 
        
        
        
        
    }
}
