<?php

namespace Frontend\ProyectoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ProyectoBundle:Default:index.html.twig', array('name' => $name));
    }
}
