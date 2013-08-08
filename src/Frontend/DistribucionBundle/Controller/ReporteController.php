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

    public function reportegraficoAction(Request $request)
    {

        $lapso=array('s'=>'selecione...','a'=>'Años','m'=>'Meses');
        $form = $this->createFormBuilder()
                ->add('lapso', 'choice', array(
                    'choices'   => $lapso,
                ))
        ->getForm();


        return $this->render('DistribucionBundle:Reportes:grafico.html.twig',array('form' => $form->createView()));



   
    }
  
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

    public function generarreportegraficoAction(Request $request)
    {
        //RECIBO LOS DATOS DEL FORMULARIO
        $datosform=$request->request->all();
        $datosform=$datosform['form'];

        $em = $this->getDoctrine()->getManager();

        if($datosform['lapso']=='a'){

            if($datosform['tipografico']=='c')
                $tituloprincipal="CANTIDAD DE OPERADORES POR AÑOS";
            else 
                $tituloprincipal="CANTIDAD DE ABONADOS POR AÑOS";

            $titulovertical='CANTIDADES';

            if($datosform['pais']=='t' && $datosform['tipooperador']=='t'){
                $dql  = "SELECT o FROM DistribucionBundle:Operador o where o.fecharegistro BETWEEN ?1 AND ?2 order by o.fecharegistro ASC";
                $query = $em->createQuery($dql);  
            }

            else if($datosform['pais']!='t' && $datosform['tipooperador']!='t'){
                $dql  = "SELECT o FROM DistribucionBundle:Operador o where o.fecharegistro BETWEEN ?1 AND ?2 and o.pais= :idpais and o.tipooperador= :idtop order by o.fecharegistro ASC";
                $query = $em->createQuery($dql);  
                $query->setParameter('idpais', $datosform['pais']);
                $query->setParameter('idtop', $datosform['tipooperador']);
            }

            else if($datosform['pais']!='t' && $datosform['tipooperador']=='t'){
                $dql  = "SELECT o FROM DistribucionBundle:Operador o where o.fecharegistro BETWEEN ?1 AND ?2 and o.pais= :idpais order by o.fecharegistro ASC";
                $query = $em->createQuery($dql);  
                $query->setParameter('idpais', $datosform['pais']);
            }

            else if($datosform['pais']=='t' && $datosform['tipooperador']!='t'){
                $dql  = "SELECT o FROM DistribucionBundle:Operador o where o.fecharegistro BETWEEN ?1 AND ?2 and o.tipooperador= :idtop order by o.fecharegistro ASC";
                $query = $em->createQuery($dql);  
                $query->setParameter('idtop', $datosform['tipooperador']);
            }

                $query->setParameter(1, $datosform['aniodesde']."-01-01");
                $query->setParameter(2, $datosform['aniohasta']."-12-31");

                //GRAFICA POR AÑO
                $operador=$query->getResult(); 
                
                foreach ($operador as $op) {
                    $anio=$op->getFecharegistro()->format('Y');
                    //cuento los operadores por mes
                    if(!isset($datos[$anio]))$datos[$anio]=0;

                    if($datosform['tipografico']=='c')
                        $datos[$anio]=$datos[$anio]+1;
                    else 
                        $datos[$anio]=$datos[$anio]+$op->getNumeroabonados();
                }

                $x='';$y='';
                foreach ($datos as $key => $value) {
                    $x .=$key.',';
                    $y .=$value.',';
                }

                $l=strlen($x);
                $x=substr($x, 0,$l-1);
                $l=strlen($y);
                $y=substr($y, 0,$l-1);

                if($datosform['pais']!='t' && $datosform['tipooperador']!='t'){
                    if($datosform['tipografico']=='c')
                        $tituloprincipal="CANTIDAD DE ".strtoupper($operador[0]->getTipooperador()->getOperador())." EN ".strtoupper($operador[0]->getPais()->getPais());
                    else
                        $tituloprincipal="CANTIDAD ABONADOS POR ".strtoupper($operador[0]->getTipooperador()->getOperador())." EN ".strtoupper($operador[0]->getPais()->getPais());
                }

                if($datosform['pais']!='t' && $datosform['tipooperador']=='t'){
                    if($datosform['tipografico']=='c')
                        $tituloprincipal="CANTIDAD DE TODOS LOS TIPOS DE OPERADOR EN ".strtoupper($operador[0]->getPais()->getPais());
                    else 
                        $tituloprincipal="CANTIDAD BONADOS POR TODOS LOS TIPOS DE OPERADOR EN ".strtoupper($operador[0]->getPais()->getPais());
                }

                if($datosform['pais']=='t' && $datosform['tipooperador']!='t'){
                    if($datosform['tipografico']=='c')
                        $tituloprincipal="CANTIDAD DE ".strtoupper($operador[0]->getTipooperador()->getOperador())." EN TODOS LOS PAÍSES";
                    else
                        $tituloprincipal="CANTIDAD ABONADOS POR ".strtoupper($operador[0]->getTipooperador()->getOperador())." EN TODOS LOS PAÍSES";
                }
        }
     

        if($datosform['lapso']=='m'){
            
            $diasmes = cal_days_in_month(CAL_GREGORIAN, $datosform['meshasta'], $datosform['anios']);
            $anio=$datosform['anios'];
            $mesdesde=$anio."-".$datosform['mesdesde']."-01";
            $meshasta=$anio."-".$datosform['meshasta']."-".$diasmes;


            if($datosform['tipografico']=='c')
                $tituloprincipal="CANTIDAD DE OPERADORES POR MESES DEL AÑO ".$anio;
            else 
                $tituloprincipal="CANTIDAD DE ABONADOS POR MESES DEL AÑO ".$anio;

            $titulovertical='CANTIDADES';




     
            if($datosform['pais']=='t' && $datosform['tipooperador']=='t'){
                $dql  = "SELECT o FROM DistribucionBundle:Operador o where o.fecharegistro BETWEEN ?1 AND ?2 order by o.fecharegistro ASC";
                $query = $em->createQuery($dql);  
            }

            else if($datosform['pais']!='t' && $datosform['tipooperador']!='t'){
                $dql  = "SELECT o FROM DistribucionBundle:Operador o where o.fecharegistro BETWEEN ?1 AND ?2 and o.pais= :idpais and o.tipooperador= :idtop order by o.fecharegistro ASC";
                $query = $em->createQuery($dql);  
                $query->setParameter('idpais', $datosform['pais']);
                $query->setParameter('idtop', $datosform['tipooperador']);
            }

            else if($datosform['pais']!='t' && $datosform['tipooperador']=='t'){
                $dql  = "SELECT o FROM DistribucionBundle:Operador o where o.fecharegistro BETWEEN ?1 AND ?2 and o.pais= :idpais order by o.fecharegistro ASC";
                $query = $em->createQuery($dql);  
                $query->setParameter('idpais', $datosform['pais']);
            }

            else if($datosform['pais']=='t' && $datosform['tipooperador']!='t'){
                $dql  = "SELECT o FROM DistribucionBundle:Operador o where o.fecharegistro BETWEEN ?1 AND ?2 and o.tipooperador= :idtop order by o.fecharegistro ASC";
                $query = $em->createQuery($dql);  
                $query->setParameter('idtop', $datosform['tipooperador']);
            }

                $query->setParameter(1, $mesdesde);
                $query->setParameter(2, $meshasta);

                //GRAFICA POR AÑO
                $operador=$query->getResult(); 
                    
                $meses= array('1'=>'Enero','2'=>'Febrero','3'=>'Marzo','4'=>'Abril','5'=>'Mayo','6'=>'Junio','7'=>'Julio','8'=>'Agosto','9'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre');

                foreach ($operador as $op) {
                    $numeromes=$op->getFecharegistro()->format('n');

                    if(!isset($datos[$numeromes]))$datos[$numeromes]=0;

                    if($datosform['tipografico']=='c')
                        $datos[$numeromes]=$datos[$numeromes]+1;
                    else
                        $datos[$numeromes]=$datos[$numeromes]+$op->getNumeroabonados();

                }
                ksort($datos);

                $x='';$y='';
                foreach ($datos as $key => $value) {
                    $x .="'".$meses[$key]."'".',';
                    $y .=$value.',';
                }
                $l=strlen($x);
                $x=substr($x, 0,$l-1);
                $l=strlen($y);
                $y=substr($y, 0,$l-1);

                if($datosform['pais']!='t' && $datosform['tipooperador']!='t'){
                    if($datosform['tipografico']=='c')
                        $tituloprincipal="CANTIDAD ABONADOS POR ".strtoupper($operador[0]->getTipooperador()->getOperador())." EN ".strtoupper($operador[0]->getPais()->getPais())." DEL AÑO ".$anio;
                    else
                        $tituloprincipal="CANTIDAD ABONADOS POR ".strtoupper($operador[0]->getTipooperador()->getOperador())." EN ".strtoupper($operador[0]->getPais()->getPais())." DEL AÑO ".$anio;
                }

                if($datosform['pais']!='t' && $datosform['tipooperador']=='t'){
                    if($datosform['tipografico']=='c')
                        $tituloprincipal="CANTIDAD ABONADOS POR TODOS LOS TIPOS DE OPERADOR EN ".strtoupper($operador[0]->getPais()->getPais())." DEL AÑO ".$anio;
                    else 
                        $tituloprincipal="CANTIDAD BONADOS POR TODOS LOS TIPOS DE OPERADOR EN ".strtoupper($operador[0]->getPais()->getPais())." DEL AÑO ".$anio;
                }

                if($datosform['pais']=='t' && $datosform['tipooperador']!='t'){
                    if($datosform['tipografico']=='c')
                        $tituloprincipal="CANTIDAD DE ABONADOS POR ".strtoupper($operador[0]->getTipooperador()->getOperador())." EN TODOS LOS PAÍSES DEL AÑO ".$anio;
                    else
                        $tituloprincipal="CANTIDAD ABONADOS POR ".strtoupper($operador[0]->getTipooperador()->getOperador())." EN TODOS LOS PAÍSES DEL AÑO ".$anio;
                }
        }
        


        /*
        //GRAFICA POR MES EN UN AÑO
        $em = $this->getDoctrine()->getManager();
        $dql   = "
        SELECT o FROM DistribucionBundle:Operador o order by o.fecharegistro ASC  
        ";
        $query = $em->createQuery($dql);
        $operador=$query->getResult(); 
        
        $meses= array('1'=>'Enero','2'=>'Febrero','3'=>'Marzo','4'=>'Abril','5'=>'Mayo','6'=>'Junio','7'=>'Julio','8'=>'Agosto','9'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre');

        foreach ($operador as $op) {
            $numeromes=$op->getFecharegistro()->format('n');

            if(!isset($datos[$numeromes]))$datos[$numeromes]=0;
            $datos[$numeromes]=$datos[$numeromes]+1;
        }
        ksort($datos);

        $x='';$y='';
        foreach ($datos as $key => $value) {
            $x .="'".$meses[$key]."'".',';
            $y .=$value.',';
        }
        $l=strlen($x);
        $x=substr($x, 0,$l-1);
        $l=strlen($y);
        $y=substr($y, 0,$l-1);
        */
        
        return $this->render('DistribucionBundle:Reportes:generargrafico.html.twig',array('y'=>$y,'x'=>$x,'tituloprincipal'=>$tituloprincipal,'titulovertical'=>$titulovertical));
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
        $html=$html;

        if($html==false){
            $this->get('session')->getFlashBag()->add('notice', 'No existen datos para los parámetros seleccionados.');
            return $this->redirect($this->generateUrl('reporte_informativo'));
        }
/*echo '<link href="/sait/web/bundles/distribucion/css/reporteinformativo.css" rel="stylesheet" type="text/css" />';
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
                //izq - der - arr - aba
                $mpdf->AddPage('L','','','','',10,10,0,0);
                //$mpdf->AddPage('L','','','','',25,25,55,45,18,12);
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
