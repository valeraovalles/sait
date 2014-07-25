<?php

namespace Frontend\CumpleaniosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CumpleaniosBundle:Default:index.html.twig', array('name' => $name));
    }
}
