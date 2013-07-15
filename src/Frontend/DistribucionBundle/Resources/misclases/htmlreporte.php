<?php

namespace Frontend\DistribucionBundle\Resources\misclases;
use Frontend\DistribucionBundle\Entity\Operador;

class htmlreporte
{
    public function informativo($em,$datos)
    {

		if($datos['operador']=='t' && $datos['tipooperador']!='t'){
			$operador=$em->getRepository('DistribucionBundle:Operador')->OperadorPorIdTipooperador(
																	 $datos['pais'],$datos['tipooperador']);}
		else
			$operador=$em->getRepository('DistribucionBundle:Operador')->OperadorPorIdTipooperadorOperador(
																	 $datos['pais'],$datos['tipooperador'],$datos['operador']);

			$representante=$em->getRepository('DistribucionBundle:Operador')->RepresentanteOperador(
																	 $datos['operador']);


		$html ="<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
		$html .="
				<div><img src='/sait/web/images/logo.png' width='150px'></div>

				<table cellspacing=1>
					<tr>
						<th>TIPO</th>
						<th>OPERADOR</th>
						<th>DIAL</th>
						<th>PAIS</th>
						<th>ZONA</th>
					</tr>
		";

		foreach ($operador as $o) {
			$html .="<tr>";
			$html .="<td>".$o->getTipooperador()."</td>";
			$html .="<td>".$o->getNombre()."</td>";
			$html .="<td>".$o->getDialUrl()."</td>";
			$html .="<td>".$o->getPais()."</td>";
			$html .="<td>".$o->getZona()."</td>";
			$html .="</tr>";
		}
		$html .="

					<tr>
						<th>NOMBRES</th>
						<th>APELLIDOS</th>
						<th>CARGO</th>
						<th>TELEFONO1</th>
						<th>CORREO</th>
					</tr>
		";

		foreach ($representante as $r) {
			$html .="<tr>";
			$html .="<td>".$r->getNombres()."</td>";
			$html .="<td>".$r->getApellidos()."</td>";
			$html .="<td>".$r->getCargo()."</td>";
			$html .="<td>".$r->getTelefono1()."</td>";
			$html .="<td>".$r->getCorreo()."</td>";
			$html .="</tr>";
		}
		$html .="</table>";
		return $html;
    }
}