<?php

namespace Frontend\ContenidosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ContenidosBundle:Default:index.html.twig', array('name' => $name));
    }
}
