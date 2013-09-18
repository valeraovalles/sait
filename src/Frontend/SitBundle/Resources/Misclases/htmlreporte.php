<?php

namespace Frontend\SitBundle\Resources\Misclases;

class htmlreporte
{
    public function informe($em,$datos)
    {


        $unidad = $em->getRepository('SitBundle:Unidad')->findAll();

        $array['s']="Seleccione";
        foreach ($unidad as $value) {
            $unidad[$value->getId()]=$value->getDescripcion();
        }

        $anio=array("s"=>"Seleccione",\date("Y")-1=>\date("Y")-1,\date("Y")=>\date("Y"));
        $mes= array('s'=>'seleccione','01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo','06'=>'Junio','07'=>'Julio','08'=>'Agosto','09'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre');


        $dql = "select t from SitBundle:Ticket t join t.subcategoria s join s.categoria c join t.user us where t.unidad= :idunidad and t.estatus=4 order by t.categoria,t.subcategoria,t.fechasolicitud, t.horasolicitud ASC";
        $query = $em->createQuery($dql);
        $query->setParameter('idunidad',$datos['unidad']);
        $ticket = $query->getResult();

        $ultimacategoria=null;$ultimasubcategoria=null;$info=null;$cont=1;
        foreach ($ticket as $value) {
        	
        	if($ultimacategoria!=$value->getCategoria())
        	$info .="<div class='cat'>".strtoupper($value->getCategoria())."</div>";
        	
        	if($ultimasubcategoria!=$value->getSubcategoria()->getSubcategoria())
        	$info .="<div class='subcat'>".ucfirst($value->getSubcategoria()->getSubcategoria())."</div>";



        	$info .="<div class='solicitud'>".$cont.".- <b>Solicitud (".$value->getFechasolicitud()->format("d-m-Y")." ".$value->getHorasolicitud()->format("G:i:s")."):</b> ".$value->getSolicitud()."</div>";
        	$info .="<div class='solucion'><b>Solución (".ucfirst(strtolower($value->getSolicitante()->getPrimernombre()))." ".ucfirst(strtolower($value->getSolicitante()->getPrimerapellido()))."):</b> ".$value->getSolucion()."</div>";

        	$ultimacategoria=$value->getCategoria();
        	$ultimasubcategoria=$value->getSubcategoria()->getSubcategoria();
        	$cont++;
        }


    	$html="
    	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

    	<style>
    		body{
    			font-size:13px;
    			font-family:Arial;
    		}

    		.cat{
    			font-weight:bold;
    			margin-top:10px;
    		}

    		.subcat{
    			margin-left:15px;
    			font-weight:bold;
    			margin-bottom:10px;
    			text-decoration: underline;
    		}

    		.solicitud{
    			margin-left:15px;
    			font-weight:normal;
    		}

    		.solucion{
    			margin-left:15px;
    			margin-bottom:10px;
    			font-weight:normal;
    		}

    		table{
    			padding:30px;
    		}

    		.titulo{
    			font-size:16px;
    			margin-top:20px;

    		}
    	</style>

    	<table>
    		<tr>
    			<td style='color:red;' class='logo'>IMAGEN LOGO TELESUR AQUÍ</td>
    			<td>
					<b>DIRECCIÓN DE SISTEMAS INFORMÁTICOS</b><br>
					<b>INFORME DE GESTIÓN AÑO: ".$datos['anios']." MES: ".strtoupper($mes[$datos['meses']])."</b><br>
					<b>".strtoupper($unidad[$datos['unidad']])."</b>
    			</td>
    		</tr>
    	</table>
    	
    	<div align='center' class='titulo'>INFORME DE GESTION</div>

    	<div align='justify' style='font-weight:bold;'>ACTIVIDADES ESPECIALES</div>
    	<br><br>
    	";

    	$html .=$info;


		$total=$cont-1;

    	$html .="
    		<div align='center'><h4>TICKETS ATENDIDOS: ".$total."</h4></div>
    		<div align='center' style='color:red;'>IMAGEN GRÁFICO AQUÍ</div>
    	";




    return $html;	
    }
}


?>


