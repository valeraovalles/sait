<?php

namespace Frontend\VideotecaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('VideotecaBundle:Default:index.html.twig');
    }
}
