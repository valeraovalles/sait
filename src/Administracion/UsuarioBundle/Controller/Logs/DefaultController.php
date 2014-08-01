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
    
    public function dataVisitaLiveAction()
    {
        $repository = $this->getDoctrine()->getRepository('UsuarioBundle:Logs\Logs');
        $logs = $repository->findRecordMin();
        $y = (int) $logs[0][1];
        $x = time() * 1000;
        $ret = array($x, $y);
        return new JsonResponse($ret);
    }
    
    public function dataSOLiveAction()
    {
        $repository = $this->getDoctrine()->getRepository('UsuarioBundle:Logs\Logs');
        $sistemasO = array("Windows", "Linux", "Mac");
        $em = $this->getDoctrine()->getManager();
        foreach ($sistemasO as $value) {
            $logs_SO[] = $repository->findSO($value, $em);
        }
        $nroSO = $logs_SO[0][0][1] + $logs_SO[1][0][1] + $logs_SO[2][0][1];
        //-- Windows
        $canWin = ($logs_SO[0][0][1] * 100) / $nroSO;
        //-- Linux
        $canLin = ($logs_SO[1][0][1] * 100) / $nroSO;
        //-- Mac
        $canMac = ($logs_SO[2][0][1] * 100) / $nroSO;
        $ret = array($canWin, $canLin, $canMac);
        return new JsonResponse($ret);
    }


}
