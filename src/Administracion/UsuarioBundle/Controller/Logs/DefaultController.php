<?php

namespace Administracion\UsuarioBundle\Controller\Logs;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Logs\Default controller.
 *
 */
class DefaultController extends Controller {

    /**
     * Dashboard Logs
     *
     */
    public function indexAction()
    {
        return $this->render('UsuarioBundle:Logs:index.html.twig');
    }
    
    public function dataLiveAction()
    {
        $repository = $this->getDoctrine()->getRepository('UsuarioBundle:Logs\Logs');
        $logs = $repository->findRecordMin();
        print_r($logs);
        return new JsonResponse($logs);
    }
}