<?php

namespace Frontend\DistribucionBundle\Resources\misclases;
use Frontend\DistribucionBundle\Entity\Operador;

class htmlreporte
{
    public function informativo($em,$datos)
    {


    	//FILTRO POR TODOS LOS OPERADORES
		if($datos['operador']=='t' && $datos['tipooperador']=='t'){
			$operador=$em->getRepository('DistribucionBundle:Operador')->Operadores($datos['pais']);
			$titulo="OPERADOR :TODOS - TIPO DE OPERADOR: TODOS - PAÍS: ".strtoupper($operador[0]->getOperador()->getPais());
		}
		

    	//FILTRO POR UN TIPO DE OPERADOR CON TODOS LOS OPERADORES
		else if($datos['operador']=='t' && $datos['tipooperador']!='t'){
			$operador=$em->getRepository('DistribucionBundle:Operador')->OperadorPorIdto(
																	 $datos['pais'],$datos['tipooperador']);
			$titulo="OPERADOR: TODOS - TIPO DE OPERADOR: ".strtoupper($operador[0]->getOperador()->getTipooperador())." - PAÍS: ".strtoupper($operador[0]->getOperador()->getPais());
		}
		
		else if($datos['operador']!='t' && $datos['tipooperador']!='t'){
			$operador=$em->getRepository('DistribucionBundle:Operador')->OperadorPorIdtoPorIdo(
																	 $datos['pais'],$datos['tipooperador'],$datos['operador']);
			$titulo="OPERADOR: ".strtoupper($operador[0]->getOperador()->getNombre())." - TIPO DE OPERADOR: ".strtoupper($operador[0]->getOperador()->getTipooperador())." - PAÍS: ".strtoupper($operador[0]->getOperador()->getPais());
		}

    	//FILTRO POR TODOS LOS TIPOS DE OPERADOR Y SELECCIONO UN OPERADOR
		else if($datos['operador']!='t' && $datos['tipooperador']=='t'){
			$operador=$em->getRepository('DistribucionBundle:Operador')->OperadorPorIdo(
																	 $datos['pais'],$datos['operador']);
			$titulo="OPERADOR: ".strtoupper($operador[0]->getOperador()->getNombre())." - TIPO DE OPERADOR: TODOS - PAÍS: ".strtoupper($operador[0]->getOperador()->getPais());
		}
		

		$html ="<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
		$html .="
				<table>
					<tr>
						<td class='imagen'><img src='/sait/web/images/logo.png' height='150px'></td>
						<td class='titulo' align='center' valing='middle' colspan='8'>REPORTE INFORMATIVO<br>".$titulo."</td>
					</tr>
				</table>

				<table cellspacing=1 cellpadding='5px' class='table'>

					<tr>
					<td colspan='5' align='center'>DATOS DE OPERADOR</td>
					<td colspan='5' align='center'>DATOS DE REPRESENTANTE</td>
					</tr>
					<tr>
						<th>TIPO</th>
						<th>OPERADOR</th>
						<th>DIAL</th>
						<th>PAIS</th>
						<th>ZONA</th>

						<th>NOMBRES</th>
						<th>APELLIDOS</th>
						<th>CARGO</th>
						<th>TELEFONO1</th>
						<th>CORREO</th>
					</tr>
		";

		$ultimooperador=0; $registros=0;
		foreach ($operador as $o) {
			$registros=0;

			$operadoractual=$o->getOperador()->getId();

			if($operadoractual!=$ultimooperador){
				$registros=1;

				//PARA CONTAR CUANTOS REGISTROS HAY
				$uo=0;$cont=0;
				foreach ($operador as $op) {
					if($operadoractual==$op->getOperador()->getId())
						$cont++;
				}

				$html .="<tr>";
				$html .="<td rowspan=".$cont.">".$o->getOperador()->getTipooperador()."</td>";
				$html .="<td rowspan=".$cont.">".$o->getOperador()->getNombre()."</td>";
				$html .="<td rowspan=".$cont.">".$o->getOperador()->getDialUrl()."</td>";
				$html .="<td rowspan=".$cont.">".$o->getOperador()->getPais()."</td>";
				$html .="<td rowspan=".$cont.">".$o->getOperador()->getZona()."</td>";
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
		$html .="</table>";
		return $html;
    }
}