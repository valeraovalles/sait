<?php

namespace Frontend\SitBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Frontend\SitBundle\Resources\Misclases\htmlreporte;


/**
 * Categoria controller.
 *
 */
class ReporteController extends Controller
{

    /**
     * Lists all Categoria entities.
     *
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();
        $unidad = $em->getRepository('SitBundle:Unidad')->findAll();

        $array['s']="Seleccione";
        foreach ($unidad as $value) {
            $array[$value->getId()]=$value->getDescripcion();
        }
        $form = $this->createFormBuilder()
            ->add('unidad', 'choice', array(
                'choices'   => $array,
            ))->getForm();
        
        return $this->render('SitBundle:Reporte:formreporte.html.twig',array('form'=>$form->createView()));

    }

    public function generarinformeAction(Request $request)
    {
        $datos=$request->request->all();
        $datos=$datos['form'];

        $em = $this->getDoctrine()->getManager();

        $a=new htmlreporte;
        $html=$a->informe($em,$datos);


        echo $html;
        header('Content-type: application/vnd.ms-word');
        header("Content-Disposition: attachment; filename=millonarios_fc.doc");
        header("Pragma: no-cache");
        header("Expires: 0");
        die;

    }
}

/*

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript">

$(function () {
    var chart;
    
    $(document).ready(function () {
        
        // Build the chart
        $('#container').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'CANTIDAD DE TICKETS CERRADOS '
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                type: 'pie',
                name: 'Browser share',
                data: [
                    ['Firefox',   45.0],
                    ['IE',       26.8],
                    {
                        name: 'Chrome',
                        y: 12.8,
                        sliced: true,
                        selected: true
                    },
                    ['Safari',    8.5],
                    ['Opera',     6.2],
                    ['Others',   0.7]
                ]
            }]
        });
    });
    
});
        </script>


<script src="/sait/web/libs/highcharts/js/highcharts.js"></script>
<script src="/sait/web/libs/highcharts/js/modules/exporting.js"></script>
<div id="container" style="min-width: 500px; height: 400px; margin: 0 auto">sdsdsdsd</div>
*/