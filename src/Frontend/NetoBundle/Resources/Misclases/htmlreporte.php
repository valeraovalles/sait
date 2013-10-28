<?php

namespace Frontend\NetoBundle\Resources\Misclases;
use Frontend\DistribucionBundle\Entity\Operador;

class htmlreporte
{
    public function recibo($em,$datos)
    {

    	foreach ($datos['concepto'] as $value) {
    		
    		if($value['descripcion']=="SUELDO BASICO"){
    			$sueldo=$value['asigna']*2;
    			$sueldo=number_format($sueldo, 2,',','.');
    			break;
    		}
    	}


    	$html ="<div style='text-align:center;'><h1>RECIBO DE PAGO</h1></div><div align='center'><link href='/sait/web/bundles/neto/reporte.css' rel='stylesheet' type='text/css'/><meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
    	$html .="
    		<table cellspacing='0' class='tablaprincipal'>
				<tr>
					<td class='imagen'><img src='/sait/web/images/logo.jpg' height='100px'></td>
					<td class='titulo' align='center' valing='middle'>
						<table cellspacing='0' class='tableencabezado'>
							<tr>
								<th>NOMBRE Y APELLIDO:</th>
								<td>".strtoupper($datos['primernombre'].' '.$datos['primerapellido'])."</td>
								<th>CÉDULA:</th>
								<td>".$datos['cedula']."</td>
							</tr>
							<tr>
								<th>EMPRESA:</th>
								<td>".strtoupper($datos['empresa'])."</td>
								<th>SUELDO MENSUAL:</th>
								<td>".$sueldo." Bs.</td>
							</tr>
							<tr>
								<th>PERIODO: </th>
								<td>".strtoupper($datos['perioricidad'])."</td>
								<th>BANCO:</th>
								<td>BANCO DE VENEZUELA</td>
							</tr>
							<tr>
								<th>PERIODO DESDE: </th>
								<td>".strtoupper($datos['periodo_desde'])."</td>
								<th>PERIODO HASTA: </th>
								<td>".strtoupper($datos['periodo_hasta'])."</td>
							</tr>
							<tr>
								<th>DEPARTAMENTO: </th>
								<td>".strtoupper($datos['departamento'])."</td>
								<th>CARGO: </th>
								<td>".strtoupper($datos['cargo'])."</td>
							</tr>
							<tr>
								<th>FECHA INGRESO:: </th>
								<td>".strtoupper($datos['fechaingreso'])."</td>
								<th>CUENTA NÓMINA: </th>
								<td>".strtoupper($datos['cuenta'])."</td>
							</tr>

						</table>
					</td>
				</tr>
    		</table>

    		<table cellspacing='0' class='tablasecundaria'>
    			<tr>
					<th>DESCRIPCIÓN DE CONCEPTOS</th>
					<th>ASIGNACIONES</th>
					<th>DEDUCCION</th>
				</tr>
    	";

    	$totalasigna=0;$totaldeduce=0;
    	foreach ($datos['concepto'] as $value) {
    		
    		$html .= '<tr><td>'.$value['descripcion'].'</td>';
    		$html .= '<td>'.$value['asigna'].'</td>';
    		$html .= '<td>'.$value['deduce'].'</td></tr>';


    		$totalasigna=$value['asigna']+$totalasigna;
    		$totaldeduce=$value['deduce']+$totaldeduce;
    		$total=$totalasigna-$totaldeduce;
    	}


    	$html .="
    	<tr>
    		<th style='text-align:right;'>SUBTOTAL:</th>
    		<th>".$totalasigna."</th>
    		<th>".$totaldeduce."</th>	
    	<tr>
    	<tr>
    		<th style='text-align:right;'>TOTAL:</th>
    		<th colspan='2' align='center'>".$total."</th>
    	</tr>
    	</table></div>";

    	return $html;
		/*if(!empty($datos)){

			$html ="<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
			$html .="
					<table>
						<tr>
							<td class='imagen'><img src='/sait/web/images/logo.jpg' height='150px'></td>
							<td class='titulo' align='center' valing='middle' colspan='8'>REPORTE INFORMATIVO<br>".$titulo."<br> Fecha desde: ".date("d-m-Y",strtotime($datos['fechadesde']))." | Fecha hasta: ".date("d-m-Y",strtotime($datos['fechahasta']))."</td>
						</tr>
					</table>

					<table cellspacing=1 cellpadding='5px' class='table'>

						<tr>
						<td colspan='6' align='center'>DATOS DE OPERADOR</td>
						<td colspan='5' align='center'>DATOS DE REPRESENTANTE</td>
						</tr>
						<tr>
							<th>TIPO</th>
							<th>OPERADOR</th>
							<th>DIAL</th>
							<th>PAIS</th>
							<th>ZONA</th>
							<th>RECEPTOR</th>
							<th>ABONADOS</th>

							<th>NOMBRES</th>
							<th>APELLIDOS</th>
							<th>CARGO</th>
							<th>TELEFONO1</th>
							<th>CORREO</th>
						</tr>
			";

			$ultimooperador=0; $registros=0; $contador=0; $sumaabonados=0;
			foreach ($operador as $o) {
				$registros=0;

				$operadoractual=$o->getOperador()->getId();

				if($operadoractual!=$ultimooperador){
					$registros=1; $contador++;

					$sumaabonados=$sumaabonados+$o->getOperador()->getNumeroabonados();

					//PARA CONTAR CUANTOS REGISTROS HAY
					$uo=0;$cont=0;
					foreach ($operador as $op) {
						if($operadoractual==$op->getOperador()->getId())
							$cont++;
					}

					if($o->getOperador()->getComodato()->getRecibereceptor()===true) $recibereceptor='Si'; else $recibereceptor='No';
					$html .="<tr>";
					$html .="<td rowspan=".$cont.">".$o->getOperador()->getTipooperador()."</td>";
					$html .="<td rowspan=".$cont.">".$o->getOperador()->getNombre()."</td>";
					$html .="<td rowspan=".$cont.">".$o->getOperador()->getDialUrl()."</td>";
					$html .="<td rowspan=".$cont.">".$o->getOperador()->getPais()."</td>";
					$html .="<td rowspan=".$cont.">".$o->getOperador()->getZona()."</td>";
					$html .="<td rowspan=".$cont.">".$recibereceptor."</td>";
					$html .="<td rowspan=".$cont.">".$o->getOperador()->getNumeroabonados()."</td>";
				}

				if($registros!=1)$html .="<tr>";

				$html .="<td>".$o->getNombres()."</td>";
				$html .="<td>".$o->getApellidos()."</td>";
				$html .="<td>".$o->getCargo()."</td>";
				$html .="<td>".$o->getTelefono1()."</td>";
				$html .="<td>".$o->getCorreo()."</td>";
				$html .="</tr>";
				
				$ultimooperador=$o->getOperador()->getId();
			}
			$html .="<tr><td></td><td></td><td></td><td colspan=2 align=right><b>Total Abonados:</b></td><td><b>".$sumaabonados."</b></td><td colspan='5'><b>Total Operadores: ".$contador."</b></td></tr></table>";
			$html .="</table>";
		}else{
			return false;
		}
		
		return $html;*/
    }
}
