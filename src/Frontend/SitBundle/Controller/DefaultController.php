<?php

namespace Frontend\SitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SitBundle:Default:index.html.twig', array('name' => $name));
    }
}
