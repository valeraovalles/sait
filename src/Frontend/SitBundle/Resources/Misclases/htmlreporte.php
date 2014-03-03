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


        $fechadesde="01-".$datos['meses']."-".$datos['anios'];
        $dias=cal_days_in_month(CAL_GREGORIAN, $datos['meses'], $datos['anios']);
        $fechahasta=$dias."-".$datos['meses']."-".$datos['anios'];

        //query para tickets cerrados sin seguimiento
        $dql = "select t from SitBundle:Ticket t, SitBundle:categoria c, SitBundle:subcategoria s 
        where 
        t.categoria = c.id and 
        t.subcategoria = s.id and
        t.unidad= :idunidad and (t.estatus=4) 
        and t.fechasolicitud BETWEEN ?1 AND ?2 
        order by t.categoria,t.subcategoria,t.fechasolicitud, t.horasolicitud ASC";

        $query = $em->createQuery($dql);
        $query->setParameter('idunidad',$datos['unidad']);
        $query->setParameter(1, $fechadesde);
        $query->setParameter(2, $fechahasta);
        $ticket = $query->getResult();

        //$query para los tickets en seguimiento y cerrados con seguimiento
        $dql1 = "select t from SitBundle:Ticket t, SitBundle:categoria c, SitBundle:subcategoria s 
        where 
        t.categoria = c.id and 
        t.subcategoria = s.id and
        t.unidad= :idunidad and (t.estatus=6 or t.estatus = 5) 
        and t.fechasolicitud BETWEEN ?1 AND ?2 
        order by t.categoria,t.subcategoria,t.fechasolicitud, t.horasolicitud ASC";
       
        $query1 = $em->createQuery($dql1);
        $query1->setParameter('idunidad',$datos['unidad']);
        $query1->setParameter(1, $fechadesde);
        $query1->setParameter(2, $fechahasta);
        $ticket1 = $query1->getResult();

        if(empty($ticket) and empty($ticket1))return null;
        $ultimacategoria=null;$ultimasubcategoria=null;$info=null;$cont=1;$conta = 1;$contador = 0;
        
        //ciclo para ticket cerrados sin seguimiento
        foreach ($ticket as $value) {
            
            if($ultimacategoria!=$value->getCategoria())
            $info .="<div class='cat'>".strtoupper($value->getCategoria())."</div>";
            
            if($ultimasubcategoria!=$value->getSubcategoria()->getSubcategoria())
            $info .="<div class='subcat'>".ucfirst($value->getSubcategoria()->getSubcategoria())."</div>";

            $usuariocierraticket=$value->getUser();

            $info .="<div style='margin-bottom:5px;text-align:justify;' class='solicitud'>".$cont.".- <b>Solicitud (".$value->getFechasolicitud()->format("d-m-Y")." ".$value->getHorasolicitud()->format("G:i:s")."):</b> ".ucfirst($value->getSolicitud())."</div>";
            //$info .="<div class='solucion'><b>Solución (".ucfirst(strtolower($usuariocierraticket[0]->getPrimernombre()))." ".ucfirst(strtolower($usuariocierraticket[0]->getPrimerapellido()))."):</b> ".ucfirst($value->getSolucion())."</div>";
            $info .="<div style='margin-bottom:15px;text-align:justify;' class='solucion'><b>Solución (".$value->getFechasolucion()->format("d-m-Y")." ".$value->getHorasolucion()->format("G:i:s")."):</b> ".ucfirst($value->getSolucion())."</div>";
            

            $ultimacategoria=$value->getCategoria();
            $ultimasubcategoria=$value->getSubcategoria()->getSubcategoria();
            $cont++;
        }

        if(!empty($ticket1))
        {            
            $info = "<div align='justify' style='font-weight:bold;color:blue;'>TICKETS CON SEGUIMIENTO</div>";
        
            //ciclo para tickets con seguimiento
            foreach ($ticket1 as $value1) {
                $conta1 = 1;
                if($ultimacategoria!=$value1->getCategoria())
                $info .="<div class='cat'>".strtoupper($value1->getCategoria())."</div>";
                
                if($ultimasubcategoria!=$value1->getSubcategoria()->getSubcategoria())
                $info .="<div class='subcat'>".ucfirst($value1->getSubcategoria()->getSubcategoria())."</div>";
                $info .="<div style='margin-bottom:5px;text-align:justify;' class='solicitud'>".$conta.".- <b>Solicitud (".$value1->getFechasolicitud()->format("d-m-Y")." ".$value1->getHorasolicitud()->format("h:i:s")."):</b> ".ucfirst($value1->getSolicitud())."</div>";
               
                $idticket = $value1->getId();     
                //$query para los tickets en seguimiento y cerrados con seguimiento
                $dql2 = "select s from SitBundle:Seguimiento s where s.ticket = ?1 order by s.fecha ASC";
                $query2 = $em->createQuery($dql2);
                $query2->setParameter(1, $idticket);
                $seguimiento = $query2->getResult();

                if(!empty($seguimiento))
                {
                    foreach ($seguimiento as $value2) {
                        if($value2->getTipo() == 'c'){$tipo = "comentario";}else{$tipo = "correo";}
                        
                        $info .="
                        <div style='margin-bottom:15px; margin-left:25px;class='solucion'>".$conta1.")
                        <div style='margin-bottom:15px; margin-left:35px;class='solucion'></b>
                        <b>Fecha: </b>".$value2->getFecha()->format("d-m-Y h:i:s")."<br> 
                        <b>Responsable: </b>".$value2->getresponsable()."<br>
                        <b>Tipo: </b>".$tipo."<br>
                        <b>Descripcion: </b>".ucfirst($value2->getEvento())."
                            </div></div>";
                        $conta1++ ;
                    }
                }

                //$usuariocierraticket=$value1->getUser();
                if ($value1->getEstatus() == 6)
                {                
                    $info .="<div style='margin-bottom:15px;text-align:justify;' class='solucion'><b>Solución (".$value1->getFechasolucion()->format("d-m-Y")." ".$value1->getHorasolucion()->format("G:i:s")."):</b> ".ucfirst($value1->getSolucion())."</div>";
                    $contador++;
                }              

                $ultimacategoria=$value1->getCategoria();
                $ultimasubcategoria=$value1->getSubcategoria()->getSubcategoria();
                $cont++;
                $conta ++;
            }
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

        <div align='justify' style='font-weight:bold;color:blue;'>ACTIVIDADES ESPECIALES</div>
        <br><br>
        ";

        $html .=$info;

        $seg = $conta -1 ;
        $total=$cont-1;
        $seg_cerrado = $contador;

        $html .="
            <div align='center'><h5>TICKETS EN SEGUIMIENTO: ".$seg."</h5></div>
            <div align='center'><h5>TICKETS CON SEGUIMIENTO (CERRADOS): ".$seg_cerrado."</h5></div>

            <div align='center'><h4>TICKETS ATENDIDOS: ".$total."</h4></div>
            <div align='center' style='color:red;'>IMAGEN GRÁFICO AQUÍ</div>
        ";




    return $html;   
    }
}


?>



