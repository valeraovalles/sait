<?php

namespace Frontend\VisitasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('FrontendVisitasBundle:Default:index.html.twig', array('name' => $name));
    }
}
