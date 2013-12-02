<?php

namespace Frontend\VisitasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\VisitasBundle\Entity\Reporte;

use Doctrine\ORM\EntityRepository;

use Frontend\VisitasBundle\Resources\misclases\htmlreporte;

/**
 * Reporte controller.
 *
 */
class ReporteController extends Controller
{

  
    public function reporteinfoAction(Request $request)
    {

        $task = new Reporte();
        $form = $this->createFormBuilder($task)

            ->add('Desde','date',array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                ))
            ->add('Hasta','date',array(
                  'widget' => 'single_text',
                  'format' => 'yyyy-MM-dd',))

            ->add('Formato','choice', array(
                            'expanded'=>false, 
                            'multiple'=>false,
                            'choices' => array(
                                                "0"=> "pdf"
                                                  )
                                        ))
            ->add('Botones', 'submit')
            ->getForm();

        return $this->render('FrontendVisitasBundle:Reporte:reporteinfo.html.twig', array(
            'task'=>$task,
            'form'=>$form->createView(),
            ));
    }




    public function finalreporteAction(Request $request)
    {
        $datos=$request->request->all();
        $datos=$datos['form'];

        $em = $this->getDoctrine()->getManager();

        $dql=    "SELECT v FROM FrontendVisitasBundle:Visita v join v.usuario u ";
        $query = $em->createQuery($dql);
        $entities = $query->getResult(); 

        $a=new htmlreporte;



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
                //izq - der - arr - aba
                $mpdf->AddPage('L','','','','',10,10,0,0);
                //$mpdf->AddPage('L','','','','',25,25,55,45,18,12);
                $stylesheet = file_get_contents('bundles/distribucion/css/reporteinformativo.css');
                $mpdf->WriteHTML($stylesheet,1);    // The parameter 1 tells that this is css/style only and no body/html/text
         
                $mpdf->WriteHTML($html);
                $mpdf->Output("reporte".".pdf","D");
                exit;
        }


    }





}