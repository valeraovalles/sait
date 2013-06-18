<?php

namespace Frontend\LicenciasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('LicenciasBundle:Default:index.html.twig', array('name' => $name));
    }
}
