<?php

namespace Frontend\DirectorioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DirectorioBundle:Default:index.html.twig', array('name' => $name));
    }
}
