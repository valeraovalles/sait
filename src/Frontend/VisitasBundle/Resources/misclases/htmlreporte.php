<?php

namespace Frontend\VisitasBundle\Resources\misclases;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\VisitasBundle\Entity\Visita;
use Frontend\VisitasBundle\Entity\Usuario;




class htmlreporte
{
    public function informativo($em,$datos)
    {

		$html ="<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
		$html .="   <table>
						<tr>
							<td class='imagen'><img src='/sait/web/images/logo.jpg' height='150px'></td>
							<td class='titulo' align='center' valing='middle' colspan='8'>REPORTE INFORMATIVO<br>".$titulo."<br> Fecha desde: ".date("d-m-Y",strtotime($datos['fechadesde']))." | Fecha hasta: ".date("d-m-Y",strtotime($datos['fechahasta']))."</td>
						</tr>
					</table>

				    <table>
					<tr>
						<td class='imagen'><img src='/sait/web/images/logo.png' height='150px'></td>

					</tr>
					</table>

					<table cellspacing=1 cellpadding='5px' class='table'>
					<tr>	<td colspan='6' align='center'>LISTADO DE USUARIOS POR FECHA</td>	
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
							<th>DIRECCIO</th>
							<th>TELEFONO</th>
					</tr>


		";

		
		return $html;
    }
}