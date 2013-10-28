<?php

namespace Frontend\VisitasBundle\Resources\misclases;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\VisitasBundle\Entity\Visita;
use Frontend\VisitasBundle\Entity\Usuario;


class htmlreporte
{

    public function visitas($em,$datos)
    {

 		$dql   = "SELECT v FROM FrontendVisitasBundle:Visita v join v.usuario u ";
        $query = $em->createQuery($dql);
        $entities = $query->getResult(); 




    	//FILTRO POR TODOS LOS OPERADORES
		if($datos['operador']=='t' && $datos['tipooperador']=='t'){
			$operador=$em->getRepository('DistribucionBundle:Operador')->Operadores($datos['pais'],$datos['fechadesde'],$datos['fechahasta']);
			if(!empty($operador))
			$titulo="OPERADOR :TODOS - TIPO DE OPERADOR: TODOS - PAÍS: ".strtoupper($operador[0]->getOperador()->getPais());
		}






		$html ="<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
		$html .="
				<table>
					<tr>
						<td class='imagen'><img src='/sait/web/images/logo.png' height='150px'></td>

					</tr>
				</table>

				<table cellspacing=1 cellpadding='5px' class='table'>

					<tr>
					<td colspan='6' align='center'>LISTADO DE USUARIOS POR FECHA</td>
					</tr>
					<tr>
							<th>NOMBRES</th>
							<th>APELLIDOS</th>
							<th>FECHA ENTRADA</th>
							<th>HORA ENTRADA</th>
							<th>FECHA SALIDA</th>
							<th>HORA SALIDA</th>
							<th>CONTACTO</th>
							<th>OBSERVACIONES</th>
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

					$html .="<tr>";
					$html .="<td rowspan=".$cont.">".$o->getOperador()->getTipooperador()."</td>";
					$html .="<td rowspan=".$cont.">".$o->getOperador()->getNombre()."</td>";
					$html .="<td rowspan=".$cont.">".$o->getOperador()->getDialUrl()."</td>";
					$html .="<td rowspan=".$cont.">".$o->getOperador()->getPais()."</td>";
					$html .="<td rowspan=".$cont.">".$o->getOperador()->getZona()."</td>";
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
		
		return $html;



	}



}






