<?php

namespace Frontend\DistribucionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\DistribucionBundle\Entity\Operador;
use Frontend\DistribucionBundle\Form\OperadorType;

use Doctrine\ORM\EntityRepository;

use Frontend\DistribucionBundle\Resources\misclases\htmlreporte;

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

    public function generarreporteAction(Request $request, $tipo, $formato)
    {
        //RECIBO LOS DATOS DEL FORMULARIO
        $datos=$request->request->all();
        $datos=$datos['form'];

        //INSTANCIO LA CLASE PARA GENERAR EL HTML DEL REPORTE
        $em = $this->getDoctrine()->getManager();
        $html=new htmlreporte;
        $html=$html->$tipo($em, $datos);
/*
echo '<link href="/sait/web/bundles/distribucion/css/reporteinformativo.css" rel="stylesheet" type="text/css" />';
echo $html;
die;*/
        if($datos['formato']=='xls'){

            header("Content-type: application/octet-stream");
            //indicamos al navegador que se está devolviendo un archivo
            header("Content-Disposition: attachment; filename=informativo.xls");
            //con esto evitamos que el navegador lo grabe en su caché
            header("Pragma: no-cache");
            header("Expires: 0");
            //damos salida a la tabla
            echo $html;
            die;
        }

        else if($datos['formato']=='pdf'){

                //GENERO EL PDF
                include("libs/MPDF/mpdf.php");
                $mpdf=new \mPDF(); 
                $stylesheet = file_get_contents('bundles/distribucion/css/reporteinformativo.css');
                $mpdf->WriteHTML($stylesheet,1);    // The parameter 1 tells that this is css/style only and no body/html/text
         
                $mpdf->WriteHTML($html);
                $mpdf->Output("reporte".".pdf","D");
                exit;
        }

        /*

        $parametros=array('idoperadordesde'=>(int)$datos['operador'], 'idoperadorhasta'=>(int)$datos['operador']);
        $parametros = serialize($parametros); 
        $parametros = urlencode($parametros); 
        $carpeta='distribucion';

        return $this->redirect("/sait/web/libs/reportes/php-jru/reporte.php?nombrereporte=operadores&extension=xls&parametros=".$parametros."&carpeta=".$carpeta);


        $this->get('session')->getFlashBag()->add('notice', 'Se ha borrado el operador '.$entity->getNombre().' y sus representantes.');
        return $this->redirect($this->generateUrl('operador'));*/

    }

}