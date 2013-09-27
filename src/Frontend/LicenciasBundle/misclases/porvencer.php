<?php
namespace Frontend\LicenciasBundle\misclases;

class porvencer
{
	public function porvencer()
	{
	
		$div_uno      = 604800;
	    $div_dos      = 1209600;
	    $div_tres     = 2419200;
	    $div_cuatro   = 4838400;
	    $div_cinco    = 6048000;
	    $hoy          = strtotime('now');

    	$conecta = pg_connect("host=192.168.3.139 port=5432 dbname=sait user=postgres password=..*t3l35ur*..")
               or die('No se ha podido conectar: ' . pg_last_error());
           
    	// Realizando una consulta SQL
   		$query = 'select 
                l.nombre, 
                l.fecha_compra, 
                l.fecha_vencimiento, 
                l.descripcion, 
                l.tipo,  
                l.codigo, 
                p.primer_nombre, 
                p.primer_apellido 
                from licencias.licencias l, usuarios.perfil p
                where l.usuario = p.user_id
                order by l.id ASC';

	    $result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());    
	    $filas = pg_num_rows($result);

	    if ($filas > 0)
	    {
	        // Imprimiendo el encabezado del HTML en variable $inicio para cada rango de tiempo
                    $titulo="
                            <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
                            <table>
                                <tr>
                                    <td class='imagen'><img src='/sait/web/images/logo.jpg' height='150px'></td>
                                    <td class='titulo' align='center' valing='middle' colspan='8'>LISTADO LICENCIAS POR VENCER</td>
                                </tr>
                            </table>";

                    $inicio1="<div align=center><table cellspacing=1 cellpadding='5px' class='table'>
                                <tr bgcolor='white'>
                                    <td colspan=7 align=center style='font-weight:bold' bgcolor=#f30>
                                        LICENCIAS QUE VENCERAN EN SIETE DIAS O MENOS
                                    </td>                      
                                </tr>    
                                <tr align=center style='font-weight:bold' bgcolor='#CFF'>
                                    <td width='225px'align=center>Nombre</td>                       
                                    <td width='100px' align=center>Fecha Compra</td>
                                    <td width='100px' align=center>Fecha Vencimiento</td>
                                    <td width='350px' align=center>Descripci&oacute;n</td>
                                    <td width='50px' align=center>Tipo</td>
                                    <td width='50px' align=center>Codigo</td>
                                    <td width='50px' align=center>Responsable</td>                         
                                </tr>";
                    $inicio2="<div align=center><table cellspacing=1 cellpadding='5px' class='table'>
                                <tr bgcolor='white'>
                                    <td colspan=7 align=center style='font-weight:bold' bgcolor=#f30>
                                        LICENCIAS QUE VENCERAN ENTRE SIETE Y QUINCE DIAS
                                    </td>                      
                                </tr>    
                                <tr align=center style='font-weight:bold' bgcolor='#CFF'>
                                    <td width='225px' align=center>Nombre</td>                       
                                    <td width='100px' align=center>Fecha Compra</td>
                                    <td width='100px' align=center>Fecha Vencimiento</td>
                                    <td width='350px' align=center>Descripci&oacute;n</td>
                                    <td width='50px' align=center>Tipo</td>
                                    <td width='50px' align=center>Codigo</td>
                                    <td width='50px' align=center>Responsable</td>                         
                                </tr>";
                    $inicio3="<div align=center><table cellspacing=1 cellpadding='5px' class='table'>
                                <tr bgcolor='white'>
                                    <td colspan=7 align=center style='font-weight:bold' bgcolor=#f30>
                                        LICENCIAS QUE VENCERAN ENTRE QUINCE O TREINTA DIAS
                                    </td>                      
                                </tr>    
                                <tr align=center style='font-weight:bold' bgcolor='#CFF'>
                                    <td width='225px' align=center>Nombre</td>                       
                                    <td width='100px' align=center>Fecha Compra</td>
                                    <td width='100px' align=center>Fecha Vencimiento</td>
                                    <td width='350px' align=center>Descripci&oacute;n</td>
                                    <td width='50px' align=center>Tipo</td>
                                    <td width='50px' align=center>Codigo</td>
                                    <td width='50px' align=center>Responsable</td>                         
                                </tr>";
                    $inicio4="<div align=center><table cellspacing=1 cellpadding='5px' class='table'>
                                <tr bgcolor='white'>
                                    <td colspan=7 align=center style='font-weight:bold' bgcolor=#f30>
                                        LICENCIAS QUE VENCERAN ENTRE TREINTA Y SESENTA DIAS
                                    </td>                      
                                </tr>    
                                <tr align=center style='font-weight:bold' bgcolor='#CFF'>
                                    <td width='225px' align=center>Nombre</td>                       
                                    <td width='100px' align=center>Fecha Compra</td>
                                    <td width='100px' align=center>Fecha Vencimiento</td>
                                    <td width='350px' align=center>Descripci&oacute;n</td>
                                    <td width='50px' align=center>Tipo</td>
                                    <td width='50px' align=center>Codigo</td>
                                    <td width='50px' align=center>Responsable</td>                         
                                </tr>";
                    $inicio5="<div align=center><table cellspacing=1 cellpadding='5px' class='table'>
                                <tr bgcolor='white'>
                                    <td colspan=7 align=center style='font-weight:bold' bgcolor=#f30>
                                        LICENCIAS QUE VENCERAN ENTRE SESENTA Y SETENTA Y CINCO DIAS
                                    </td>                      
                                </tr>    
                                <tr align=center style='font-weight:bold' bgcolor='#CFF'>
                                    <td width='225px' align=center>Nombre</td>                       
                                    <td width='100px' align=center>Fecha Compra</td>
                                    <td width='100px' align=center>Fecha Vencimiento</td>
                                    <td width='350px' align=center>Descripci&oacute;n</td>
                                    <td width='50px' align=center>Tipo</td>
                                    <td width='50px' align=center>Codigo</td>
                                    <td width='50px' align=center>Responsable</td>                         
                                </tr>";            
        // Imprimiendo el Resultado de la consulta en variable $cuerpo
                    $line = array();
                    $cuerpo1 = null;
                    $cuerpo2 = null;
                    $cuerpo3 = null;
                    $cuerpo4 = null;
                    $cuerpo5 = null;
                    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) 
                    {
                        $fecha = $line['fecha_vencimiento'];
                        $fecha_venc= strtotime($fecha);
                        $total = ($fecha_venc - $hoy);
                        if ($total>=0)
                        {
                            if ($total>=0 && $total<=604800)
                            {
                                $cuerpo1.="<tr align=center style='font-weight:bold' bgcolor='white'>";
                                $cuerpo1.="<td align=center>$line[nombre]</td>";
                                $cuerpo1.="<td align=center>$line[fecha_compra]</td>";
                                $cuerpo1.="<td align=center>$line[fecha_vencimiento]</td>";
                                $cuerpo1.="<td align=center>$line[descripcion]</td>";
                                if ($line['tipo']=='l')
                                {
                                    $cuerpo1.="<td align=center>Licencia</td>";
                                }elseif ($line['tipo']=='s')
                                {
                                    $cuerpo1.="<td align=center>Servicio</td>";
                                }
                                $cuerpo1.="<td align=center>$line[codigo]</td>";
                                $cuerpo1.="<td align=center>$line[primer_nombre] $line[primer_apellido]</td>";
                                $cuerpo1.="</tr>";
                            }elseif($total>604800 && $total<=1209600)
                            {
                                $cuerpo2.="<tr align=center style='font-weight:bold' bgcolor='white'>";
                                $cuerpo2.="<td align=center>$line[nombre]</td>";
                                $cuerpo2.="<td align=center>$line[fecha_compra]</td>";
                                $cuerpo2.="<td align=center>$line[fecha_vencimiento]</td>";
                                $cuerpo2.="<td align=center>$line[descripcion]</td>";
                                if ($line['tipo']=='l')
                                {
                                    $cuerpo2.="<td align=center>Licencia</td>";
                                }elseif ($line['tipo']=='s')
                                {
                                    $cuerpo2.="<td align=center>Servicio</td>";
                                }
                                $cuerpo2.="<td align=center>$line[codigo]</td>";
                                $cuerpo2.="<td align=center>$line[primer_nombre] $line[primer_apellido]</td>";
                                $cuerpo2.="</tr>";

                            }elseif($total>1209600 && $total<=2419200)
                            {
                                $cuerpo3.="<tr align=center style='font-weight:bold' bgcolor='white'>";
                                $cuerpo3.="<td align=center>$line[nombre]</td>";
                                $cuerpo3.="<td align=center>$line[fecha_compra]</td>";
                                $cuerpo3.="<td align=center>$line[fecha_vencimiento]</td>";
                                $cuerpo3.="<td align=center>$line[descripcion]</td>";
                                if ($line['tipo']=='l')
                                {
                                    $cuerpo3.="<td align=center>Licencia</td>";
                                }elseif ($line['tipo']=='s')
                                {
                                    $cuerpo3.="<td align=center>Servicio</td>";
                                }
                                $cuerpo3.="<td align=center>$line[codigo]</td>";
                                $cuerpo3.="<td align=center>$line[primer_nombre] $line[primer_apellido]</td>";
                                $cuerpo3.="</tr>";

                            }elseif($total>2419200 && $total<=4838400)
                            {
                                $cuerpo4.="<tr align=center style='font-weight:bold' bgcolor='white'>";
                                $cuerpo4.="<td align=center>$line[nombre]</td>";
                                $cuerpo4.="<td align=center>$line[fecha_compra]</td>";
                                $cuerpo4.="<td align=center>$line[fecha_vencimiento]</td>";
                                $cuerpo4.="<td align=center>$line[descripcion]</td>";
                                if ($line['tipo']=='l')
                                {
                                    $cuerpo4.="<td align=center>Licencia</td>";
                                }elseif ($line['tipo']=='s')
                                {
                                    $cuerpo4.="<td align=center>Servicio</td>";
                                }
                                $cuerpo4.="<td align=center>$line[codigo]</td>";
                                $cuerpo4.="<td align=center>$line[primer_nombre] $line[primer_apellido]</td>";
                                $cuerpo4.="</tr>";
                            }elseif($total>4838400 && $total<=6048000)
                            {
                                $cuerpo5.="<tr align=center style='font-weight:bold' bgcolor='white'>";
                                $cuerpo5.="<td align=center>$line[nombre]</td>";
                                $cuerpo5.="<td align=center>$line[fecha_compra]</td>";
                                $cuerpo5.="<td align=center>$line[fecha_vencimiento]</td>";
                                $cuerpo5.="<td align=center>$line[descripcion]</td>";
                                if ($line['tipo']=='l')
                                {
                                    $cuerpo5.="<td align=center>Licencia</td>";
                                }elseif ($line['tipo']=='s')
                                {
                                    $cuerpo5.="<td align=center>Servicio</td>";
                                }
                                $cuerpo5.="<td align=center>$line[codigo]</td>";
                                $cuerpo5.="<td align=center>$line[primer_nombre] $line[primer_apellido]</td>";
                                $cuerpo5.="</tr>";
                            }
                        }//if $total>0
                    }//while  
                    $fin="</table>";
                    $fin.="</div>";
                    $html = $titulo;
                    $esp = "<br>";
                    if(!empty($cuerpo1))
                    {
                        $html1=$inicio1.$cuerpo1.$fin;
                        $html.=$html1.$esp;
                      //  echo $html1."<br>";
                    }
                    if(!empty($cuerpo2)) 
                    {
                        $html2=$inicio2.$cuerpo2.$fin;
                        $html .= $html2.$esp;
                      //  echo $html2."<br>";
                    }
                    if(!empty($cuerpo3)) 
                    {
                        $html3=$inicio3.$cuerpo3.$fin;
                        $html .= $html3.$esp;
                      //  echo $html3."<br>";
                    }
                    if(!empty($cuerpo4)) 
                    {
                        $html4=$inicio4.$cuerpo4.$fin;
                        $html .= $html4.$esp;
                       //     echo $html4."<br>";
                    }
                    if(!empty($cuerpo5)) 
                    {
                        $html5=$inicio5.$cuerpo5.$fin;
                         $html .= $html5.$esp;
                         //   echo $html5."<br>";
                    }

	    }
	    // Liberando el conjunto de resultados
	    pg_free_result($result);
	    
	    // Cerrando la conexión
	    pg_close($conecta);
        return $html;	
    }
}