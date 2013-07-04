<?php

namespace Frontend\DistribucionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\DistribucionBundle\Entity\Operador;
use Frontend\DistribucionBundle\Form\OperadorType;

use Doctrine\ORM\EntityRepository;

/**
 * Reporte controller.
 *
 */
class ReporteController extends Controller
{

  
    public function reporteinformativoAction(Request $request)
    {
    	$entity = new Operador();
        $form   = $this->createForm(new OperadorType(0), $entity);


        // create a task and give it some dummy data for this example
        $form = $this->createFormBuilder()
            ->add('pais', 'entity', array(
                    'class' => 'DistribucionBundle:Pais',
                    'property' => 'pais',
                    'empty_value' => 'Seleccione...',
                    'query_builder' => function(EntityRepository $er) {
                            return $er->createQueryBuilder('u')
                            ->orderBy('u.pais', 'ASC')
                            ;
                    },
                ))
        ->getForm();

        return $this->render('DistribucionBundle:Reportes:informativo.html.twig', array('form'   => $form->createView()));

    }

    public function generarreporteinformativoAction(Request $request)
    {
        $datos=$request->request->all();
        $datos=$datos['form'];


        $parametros=array('idoperadordesde'=>$datos['operador'], 'idoperadorhasta'=>$datos['operador']);
        $parametros = serialize($parametros); 
        $parametros = urlencode($parametros); 

        $carpeta='distribucion';

        return $this->redirect("/sait/web/libs/reportes/php-jru/reporte.php?nombrereporte=operadores&extension=pdf&parametros=".$parametros."&carpeta=".$carpeta);



    }

}