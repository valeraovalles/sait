<?php

namespace Frontend\TransporteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TransporteBundle:Default:index.html.twig');
    }
}
