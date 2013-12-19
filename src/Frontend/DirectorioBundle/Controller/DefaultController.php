<?php

namespace Frontend\DirectorioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function inicioAction()
    {
        return $this->render('DirectorioBundle:Default:inicio.html.twig', array());
    }





}
