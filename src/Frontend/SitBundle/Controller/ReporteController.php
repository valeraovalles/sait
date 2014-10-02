<?php
namespace Frontend\SitBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Frontend\SitBundle\Resources\Misclases\htmlreporte;

use Frontend\ProyectoBundle\Entity\Tarea;

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


    public function generarimagenesAction(Request $request)
    {
        $datos=$request->request->all();
        $datos=$datos['form'];

        $mes= array('s'=>'seleccione','01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo','06'=>'Junio','07'=>'Julio','08'=>'Agosto','09'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre');

        $em = $this->getDoctrine()->getManager();

        $fechadesde="01-".$datos['meses']."-".$datos['anios'];
        $dias=cal_days_in_month(CAL_GREGORIAN, $datos['meses'], $datos['anios']);
        $fechahasta=$dias."-".$datos['meses']."-".$datos['anios'];

        $dql = "select t from SitBundle:Ticket t join t.categoria c where t.unidad= :idunidad and (t.estatus=4 or t.estatus = 6 or t.estatus = 5) and t.fechasolicitud BETWEEN ?1 AND ?2 order by t.categoria,t.subcategoria,t.fechasolicitud, t.horasolicitud ASC";
        $query = $em->createQuery($dql);
        $query->setParameter('idunidad',$datos['unidad']);
        $query->setParameter(1, $fechadesde);
        $query->setParameter(2, $fechahasta);
        $ticket = $query->getResult();

        if(empty($ticket)){
            $this->get('session')->getFlashBag()->add('alert', 'No existen datos para la fecha seleccionada');
            return $this->redirect($this->generateUrl('reporte'));
        }


        foreach ($ticket as $value) {
            $categorias[$value->getCategoria()->getCategoria()]=0;
        }

        foreach ($ticket as $value) {
            $categorias[$value->getCategoria()->getCategoria()]=$categorias[$value->getCategoria()->getCategoria()]+1;
        }

        $grafico="";
        foreach ($categorias as $key => $value) {

            $grafico .="['".$key."',".$value."],";

        }
        $grafico = substr($grafico, 0, -1);


        return $this->render('SitBundle:Reporte:imagenesinforme.html.twig',array('datos'=>$datos,'datosgrafico'=>$grafico,'mes'=>$mes));


    }
    public function generarinformeAction(Request $request)
    {
       header('Content-type: application/vnd.ms-word');
        header("Content-Disposition: attachment; filename=informe.doc");
        header("Pragma: no-cache");
        header("Expires: 0");

        $datos=$request->request->all();
        $datos=$datos['form'];
        
        //equivalencia con el nivel organizacional
        $idunidad=$datos['unidad'];
        if($idunidad==1)$idunidad=53;
        else if($idunidad==2)$idunidad=50;
        else if($idunidad==3)$idunidad=52;
        else if($idunidad==4)$idunidad=51;

        $em = $this->getDoctrine()->getManager();
        //cuento las tareas del proyecto
        $dql = "select x from ProyectoBundle:Tarea x join x.proyecto p join p.nivelorganizacional n where n.id= :idnivel and p.estatus!=3";
        $query = $em->createQuery($dql);
        $query->setParameter('idnivel',$idunidad);
        $tarea = $query->getResult();

        $em = $this->getDoctrine()->getManager();
        $a=new htmlreporte;
        $html=$a->informe($em,$datos,$tarea);
        if($html==null){
            $this->get('session')->getFlashBag()->add('alert', 'No existen datos para la fecha seleccionada');
            return $this->redirect($this->generateUrl('reporte'));
        }

        echo $html;
        die;

    }
}