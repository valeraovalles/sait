<?php

namespace Frontend\NetoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Administracion\UsuarioBundle\Resources\Misclases\Conexion;
use Administracion\UsuarioBundle\Resources\Misclases\Funcion;
use Frontend\NetoBundle\Resources\Misclases\htmlreporte;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $IdUsuario = $this->get('security.context')->getToken()->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('UsuarioBundle:Perfil')->find($IdUsuario);
        if($entity->getUser()->getFueradenomina()==true)
             return $this->redirect($this->generateUrl('usuario_homepage'));

    	$tipnom=array('s'=>'Seleccione', 'n'=>'Nómina', 'a'=>'Aguinaldos');
    	
        $form = $this->createFormBuilder()
                ->add('tipnom', 'choice', array(
                    'choices'   => $tipnom,
                ))->getForm();

        return $this->render('NetoBundle:Default:index.html.twig',array('form'=>$form->createView()));
    }

    public function generarreciboAction(Request $request)
    {
        $datos=$request->request->all();
        $datos=$datos['form'];

        $em = $this->getDoctrine()->getManager();
        $usuario = $em->getRepository('UsuarioBundle:Perfil')->find($this->get('security.context')->getToken()->getUser()->getId());

        $a=new Conexion;
        $conn=$a->postgresql_sigefirrhh();

        $anio=$datos['anios'];
        $mes=$datos['meses'];
        $quincena=$datos['periodo'];

        $query="

            SELECT max(g.periodicidad) as periodicidad, a.semana_quincena,
            max(d.nombre) as tipopersonal, 
            max(tr.fecha_ingreso) as ingresoorganismo, 
            max(b.estatus) as estatus, max(b.forma_pago) as formapago, 
            max(b.cuenta_nomina) as cuenta_nomina, max(e.cedula) as codtra, 
            e.primer_nombre as primer_nombre, e.segundo_nombre as segundo_nombre, 
            e.primer_apellido as primer_apellido, e.segundo_apellido as segundo_apellido, 
            k.descripcion_cargo as cargo, 
            j.nombre as nombreunidad, c.descripcion as descon, 
            a.id_historico_quincena as id_contador, a.unidades as unidades, a.monto_asigna as asigna, 
            a.monto_deduce as deduce FROM historicoquincena a, historiconomina b, 
            trabajador tr,concepto c, tipoPersonal d, personal e, conceptoTipoPersonal f, 
            grupoNomina g, dependencia j, cargo k, frecuenciaTipoPersonal ftp, frecuenciaPago fp 
            WHERE a.anio = ".$anio." AND a.mes = ".$mes." AND a.semana_quincena = ".$quincena." AND e.cedula = ".$usuario->getCedula()." 
            AND a.numero_nomina = 0 AND g.id_grupo_nomina = a.id_grupo_nomina 
            AND d.id_tipo_personal = a.id_tipo_personal AND b.id_tipo_personal = d.id_tipo_personal 
            AND b.id_trabajador = a.id_trabajador AND a.id_historico_nomina=b.id_historico_nomina 
            AND b.id_trabajador=tr.id_trabajador AND e.id_personal = tr.id_personal 
            AND j.id_dependencia = b.id_dependencia AND k.id_cargo = b.id_cargo 
            AND f.id_concepto_tipo_personal = a.id_concepto_tipo_personal 
            AND c.id_concepto = f.id_concepto AND a.id_frecuencia_tipo_personal = ftp.id_frecuencia_tipo_personal 
            AND ftp.id_frecuencia_pago = fp.id_frecuencia_pago and c.cod_concepto <> '5000' 
            group by d.cod_tipo_personal,b.codigo_nomina,e.cedula, e.primer_nombre, 
            e.segundo_nombre, e.primer_apellido, e.segundo_apellido,k.cod_cargo, 
            k.descripcion_cargo, j.cod_dependencia, j.nombre, c.cod_concepto, c.descripcion, 
            a.id_historico_quincena, a.unidades, a.monto_asigna, a.monto_deduce,a.documento_soporte, 
            k.grado, fp.cod_frecuencia_pago,a.semana_quincena order by d.cod_tipo_personal, j.cod_dependencia,
            b.codigo_nomina, e.cedula, c.cod_concepto,a.semana_quincena

        ";
 
        $rs = pg_query($conn, $query);

        $existe=0;
        while($row = pg_fetch_array($rs)){

            //empresa
            $recibo['empresa']='La Nueva TelevisiÓn del Sur.';
            //perioricidad
            if($row['semana_quincena']==1) $recibo['perioricidad']='Primera Quincena'; else $recibo['perioricidad']='Segunda Quincena';
            //periodo desde
            if($row['semana_quincena']==1)
            $recibo['periodo_desde']='01/'.$mes.'/'.$anio;
            else
            $recibo['periodo_desde']='16/'.$mes.'/'.$anio;
            //periodo hasta
            $numerodiasmes = intval(date("t",$mes));
            if($row['semana_quincena']==1)
            $recibo['periodo_hasta']='15/'.$mes.'/'.$anio;
            else
            $recibo['periodo_hasta']=$numerodiasmes.'/'.$mes.'/'.$anio;
            //primer nombre
            $recibo['primernombre']=$row['primer_nombre'];
            //segundo nombre
            $recibo['segundonombre']=$row['segundo_nombre'];
            //primer apellido
            $recibo['primerapellido']=$row['primer_apellido'];
            //segundo apellido
            $recibo['segundoapellido']=$row['segundo_apellido'];
            //departamento
            $recibo['departamento']=$row['nombreunidad'];
            //cargo
            $recibo['cargo']=$row['cargo'];
            //cedula
            $recibo['cedula']=$row['codtra'];
            //fecha ingreso
            $fechaingreso=explode("-",$row['ingresoorganismo']);
            $recibo['fechaingreso']=$fechaingreso[2].'/'.$fechaingreso[1].'/'.$fechaingreso[0];
            //concepto
            $recibo['concepto'][]=array('descripcion'=>$row['descon'],'asigna'=>$row['asigna'],'deduce'=>$row['deduce']);
            //cuenta
            if($row['cuenta_nomina']=='')
            $recibo['cuenta']='N/A';
            else
            $recibo['cuenta']=$row['cuenta_nomina'];

            //guardo quincena en una variable para utilizarla afuera
            $quincena=$row['semana_quincena'];

            $existe=1;
        }


;
        //valido la fecha de activación del neto
        if($anio==date('Y')){
            //mes
            if($mes==date('n'))
                //quicena
                if($quincena==1){

                    $diasemana=date("w", mktime(0, 0, 0, $mes, 14, $anio));

                    //dia de la semana
                    if($diasemana==0)$diaactivacion=12;
                    else if($diasemana==1)$diaactivacion=11;
                    else if($diasemana==6)$diaactivacion=13;

                    if(date('j')>=$diaactivacion)$existe=$existe; else $existe=0;

                }

                else if($quincena==2){

                    $ultimodia=date('t');
                    if($ultimodia==31)$ultimodia=30;
                    $diasemana=date("w", mktime(0, 0, 0, $mes, $ultimodia, $anio));

                    //dia de la semana
                    if($diasemana==0)$diaactivacion=$ultimodia-2;
                    else if($diasemana==1)$diaactivacion=$ultimodia-3;
                    else if($diasemana==6)$diaactivacion=$ultimodia-1;

                    if(date('j')>=$diaactivacion)$existe=$existe; else $existe=0;
                }
        }
          

        if($existe==0){
             $this->get('session')->getFlashBag()->add('alert', 'No existen datos para los parámetros seleccionados.');
             return $this->redirect($this->generateUrl('neto_homepage'));

        }

        $a=new htmlreporte;
        $html=$a->recibo($em,$recibo);
        //echo $html;
        //die;

        //GENERO EL PDF
        include("libs/MPDF/mpdf.php");
        $mpdf=new \mPDF();

        //$mpdf->AddPage('L','','','','',25,25,55,45,18,12);
        $stylesheet = file_get_contents('bundles/neto/reporte.css');
        $mpdf->WriteHTML($stylesheet,1);    // The parameter 1 tells that this is css/style only and no body/html/text
 
        $mpdf->WriteHTML($html);
        $mpdf->Output("reporte".".pdf","D");
        exit;

    }
}
