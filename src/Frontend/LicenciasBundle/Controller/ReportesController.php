<?php
namespace Frontend\LicenciasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\LicenciasBundle\Entity\Licencias;
use Frontend\LicenciasBundle\Form\LicenciasType;

use Administracion\UsuarioBundle\Entity\Perfil;
use Administracion\UsuarioBundle\Entity\User;

use Doctrine\ORM\EntityRepository;

use Frontend\LicenciasBundle\misclases\porvencer;
use Frontend\LicenciasBundle\misclases\total;
use Frontend\LicenciasBundle\misclases\vencidas;


/**
 * Reportes controller.
 *
 */
class ReportesController extends Controller
{
    public function totalAction()
    {
        $em = $this->getDoctrine()->getManager();

        



        $entities = $em->getRepository('LicenciasBundle:Licencias')->findAll();





        $html=new total;
        $html=$html->total($em, $entities);

        if($html==false){
            $this->get('session')->getFlashBag()->add('notice', 'No existen datos para los parámetros seleccionados.');
            return $this->redirect($this->generateUrl('licencias_homepage'));
        }

        //GENERO EL PDF
        include("libs/MPDF/mpdf.php");
        $mpdf=new \mPDF();
        $mpdf->AddPage('L','','','','',10,10,0,0);
        $stylesheet = file_get_contents('bundles/distribucion/css/distribucion.css');
        $mpdf->WriteHTML($stylesheet,1);    // The parameter 1 tells that this is css/style only and no body/html/text
        $mpdf->WriteHTML($html);
        $mpdf->Output("Lic_total".".pdf","D");
        exit;
    }

    public function porvencerAction()
    {
        $retorno='licencias_por_vencer';
        $hoy = date("Y-m-d", time());
        $mes_siguiente = date('Y-m-d', strtotime('+8 week'));
        $em = $this->getDoctrine()->getManager();
        $dql = 'select l.id, l.nombre, l.codigo, l.fechaCompra, l.fechaVencimiento, l.descripcion from LicenciasBundle:Licencias l 
                where l.fechaVencimiento  between :hoy and :dos_meses order by l.id ASC ';
        $consulta = $em->createQuery($dql)->setParameters(
                                                            array(
                                                                    'hoy'       => $hoy, 
                                                                    'dos_meses' => $mes_siguiente
                                                                 )
                                                         );
        $entities = $consulta->getResult();

        $html=new porvencer;
        $html=$html->porvencer($em, $entities);

        if($html==false){
            $this->get('session')->getFlashBag()->add('notice', 'No existen datos para los parámetros seleccionados.');
            return $this->redirect($this->generateUrl('licencias_por_vencer'));
        }
            //GENERO EL PDF
        include("libs/MPDF/mpdf.php");
        $mpdf=new \mPDF();
        $mpdf->AddPage('L','','','','',10,10,0,0);
        $stylesheet = file_get_contents('bundles/distribucion/css/distribucion.css');
        $mpdf->WriteHTML($stylesheet,1);    // The parameter 1 tells that this is css/style only and no body/html/text
        $mpdf->WriteHTML($html);
        $mpdf->Output("Lic_por_vencer".".pdf","D");
        exit;
    }

    public function vencidasAction()
    {
        $retorno='licencias_por_vencer';
        $hoy = date("Y-m-d", time());
        $mes_siguiente = date('Y-m-d', strtotime('+8 week'));
        $em = $this->getDoctrine()->getManager();
        $dql = 'select l.id, l.nombre, l.codigo, l.fechaCompra, l.fechaVencimiento, l.descripcion from LicenciasBundle:Licencias l 
                where l.fechaVencimiento  between :hoy and :dos_meses order by l.id ASC ';
        $consulta = $em->createQuery($dql)->setParameters(
                                                            array(
                                                                    'hoy'       => $hoy, 
                                                                    'dos_meses' => $mes_siguiente
                                                                 )
                                                         );
        $entities = $consulta->getResult();

        $html=new vencidas;
        $html=$html->vencidas($em, $entities);

        if($html==false){
            $this->get('session')->getFlashBag()->add('notice', 'No existen datos para los parámetros seleccionados.');
            return $this->redirect($this->generateUrl('licencias_por_vencer'));
        }
            //GENERO EL PDF
        include("libs/MPDF/mpdf.php");
        $mpdf=new \mPDF();
        $mpdf->AddPage('L','','','','',10,10,0,0);
        $stylesheet = file_get_contents('bundles/distribucion/css/distribucion.css');
        $mpdf->WriteHTML($stylesheet,1);    // The parameter 1 tells that this is css/style only and no body/html/text
        $mpdf->WriteHTML($html);
        $mpdf->Output("Lic_vencidas".".pdf","D");
        exit;
    }
}