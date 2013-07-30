<?php

namespace Frontend\NominaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Administracion\UsuarioBundle\Resources\Misclases\Conexion;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction($name)
    {

        return $this->render('NominaBundle:Default:index.html.twig', array('name' => $name));
    }

    public function formalimentacionAction(){

    	$tn=array('0'=>'Seleccione...', '21'=>'Trabajadores e','25'=>'Trabajadores o','14'=>'Trabajadores an','24'=>'Contratados','32'=>'Comision de servicios','31'=>'Convenios internacionales','41'=>'Jubilados y pensionados');
    	$anio=array('0'=>'Seleccione...', '2012'=>'2012','2013'=>'2013');
    	$mes=array('0'=>'Seleccione...', '1'=>'Enero','2'=>'Febrero','3'=>'Marzo','4'=>'Abril','5'=>'Mayo','6'=>'Junio','7'=>'Julio','8'=>'Agosto','9'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre');
		$form = $this->createFormBuilder()
		        ->add('tiponomina', 'choice', array(
		            'choices'   => $tn))
		        ->add('anio', 'choice', array(
		            'choices'   => $anio))
		      	->add('mes', 'choice', array(
		            'choices'   => $mes))
		      ->getForm();

		return $this->render('NominaBundle:Default:formalimentacion.html.twig',array('form'=>$form->createView()));

    }


    public function txtalimentacionAction(Request $request){

        //RECIBO LOS DATOS DEL FORMULARIO
        $datos=$request->request->all();
        $datos=$datos['form'];

		$a=new Conexion;
		$postgresql_sigefirrhh=$a->postgresql_sigefirrhh();

		$tipo='OBR';
		$query="
		select p.nacionalidad, p.cedula, sum(hq.monto_asigna)-sum(hq.monto_deduce) as neto 
		from nominaespecial ne, historicoquincena hq, trabajador t, personal p
		where 
		ne.id_nomina_especial=hq.id_nomina_especial and
		ne.id_frecuencia_pago=22 and ne.anio=".$datos['anio']." and ne.mes=".$datos['mes']." and
		hq.id_trabajador=t.id_trabajador and p.id_personal=t.id_personal and hq.id_tipo_personal=".$datos['tiponomina']."
		group by p.nacionalidad, p.cedula
		";

		$rs = pg_query($postgresql_sigefirrhh,$query);
		$row=pg_fetch_array($rs);

		if(empty($row[0])){
            $this->get('session')->getFlashBag()->add('notice', 'No existen datos para los parámetros seleccionados.');
            return $this->redirect($this->generateUrl('nomina_formalimentacion'));
        }


		$cadena='';
		$cont=0;
		$total_monto=0;
		while($row=pg_fetch_array($rs)){ 
		    
		    $cant=0;
		    $ceros='';
		    $monto_x='';
		    
		    $nac= trim($row['nacionalidad']);
		    $ced= trim($row['cedula']);
		    $mon= trim($row['neto']);
		    
		    // agrego ceros faltantes a las cedulas
		    $l=strlen($ced);
		                    
		    $cant= 10 - $l;
		    if($cant!=0){
		        for($i=0;$i<$cant;$i++){
		            $ceros .= '0';
		        }
		                    
		        $cedula = $ceros.$ced;
		    }
		    else $cedula = $ced;
		    

		    // agrego ceros faltantes al monto
		    $ceros='';
		    $mon = str_replace(",", ".", $mon);
		    $total_monto=$mon+$total_monto;
		    $monto = number_format($mon, 2, "", ""); 
		    
		    
		    
		    $l=strlen($monto);
		                
		    $cant= 15 - $l;
		    if($cant!=0){
		        for($i=0;$i<$cant;$i++){
		            $ceros .= '0';
		    }

		    $monto_x = $ceros.$monto;
		    }
		    else $monto_x = $monto;
		        
		    $cadena .= $nac.$cedula.$monto_x."\r\n";
		    
		    $cont++;
		}                   



		//ENCABEZADO
		$ceros='';
		$l=strlen($cont);

		$cant= 6 - $l;
		if($cant!=0){
		    for($i=0;$i<$cant;$i++){
		        $ceros .= '0';
		    }

		    $empleados = $ceros.$cont;
		}

		//MONTO

		$ceros='';
		$total_monto = number_format($total_monto, 2, "", "");
		$l=strlen($total_monto);

		$cant= 15 - $l;
		if($cant!=0){
		    for($i=0;$i<$cant;$i++){
		        $ceros .= '0';
		    }

		    $total = $ceros.$total_monto;
		}
		   
		$encabezado="ATMCCBDE900061".$empleados.$total."20121130\r\n";

		$cadena_final =$encabezado.$cadena;

		            header("Content-type: application/octet-stream");
		            //indicamos al navegador que se está devolviendo un archivo
		            header("Content-Disposition: attachment; filename=informativo.txt");
		            //con esto evitamos que el navegador lo grabe en su caché
		            header("Pragma: no-cache");
		            header("Expires: 0");
		            //damos salida a la tabla
		            echo $cadena_final;
		            die;

    }
}
