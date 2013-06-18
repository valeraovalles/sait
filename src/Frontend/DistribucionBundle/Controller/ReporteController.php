<?php

namespace Frontend\DistribucionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\DistribucionBundle\Entity\Operador;
use Frontend\DistribucionBundle\Form\OperadorType;

/**
 * Reporte controller.
 *
 */
class ReporteController extends Controller
{

  
    public function reporteinformativoAction(Request $request)
    {
        $parametros=array('idoperadordesde'=>1, 'idoperadorhasta'=>1734);
        $parametros = serialize($parametros); 
        $parametros = urlencode($parametros); 

        $carpeta='distribucion';

        return $this->redirect("/sait/web/libs/reportes/php-jru/reporte.php?nombrereporte=operadores&extension=pdf&parametros=".$parametros."&carpeta=".$carpeta);






    	$entity = new Operador();
        $form   = $this->createForm(new OperadorType(0), $entity);

        return $this->render('DistribucionBundle:Reportes:informativo.html.twig', array('form'   => $form->createView()));

        
    }

}