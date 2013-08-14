<?php

namespace Frontend\NetoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('NetoBundle:Default:index.html.twig');
    }
}
