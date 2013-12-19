<?php

namespace Frontend\AgendaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('FrontendAgendaBundle:Default:index.html.twig', array('name' => $name));
    }
}
