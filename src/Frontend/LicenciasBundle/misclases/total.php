<?php
namespace Frontend\LicenciasBundle\misclases;
class total
{
	public function total($em, $entities)
	{

        
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
	    $hoy =  time();
        $mes =  strtotime('+8 week');
	    $html= '';
	    $esp = "<br><br>";
	    if ($filas > 0)
	    {
	        // Imprimiendo el encabezado del HTML en variable $inicio para cada rango de tiempo
                    
                    $titulo="
                    		<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
                    		<table>
                    			<tr>
									<td class='imagen'><img src='/sait/web/images/logo.jpg' height='150px'></td>
									<td class='titulo' align='center' valing='middle' colspan='8'>LISTADO TOTAL DE LICENCIAS</td>
								</tr>
                    		</table>";
                    $inicio="
                    			<table cellspacing=1 cellpadding='5px' class='table'>
                                   
                                <tr align=center style='font-weight:bold' bgcolor=#CFF>
                                    <td width='225px' align=center>Nombre</td>                       
                                    <td width='100px' align=center>Fecha Compra</td>
                                    <td width='100px' align=center>Fecha Vencimiento</td>
                                    <td width='350px' align=center>Descripci&oacute;n</td>
                                    <td width='50px' align=center>Tipo</td>
                                    <td width='50px' align=center>Estatus</td>
                                    <td width='50px' align=center>Codigo</td>
                                    <td width='50px' align=center>Responsable</td>                         
                                </tr>";
                  
        // Imprimiendo el Resultado de la consulta en variable $cuerpo
                    $line = array();
                    $cuerpo = null;
                    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) 
                    {
                        
                    	$fecha = $line['fecha_vencimiento'];
                    	$fecha_venc= strtotime($fecha);


                        if ($fecha_venc > $hoy && $fecha_venc> $mes)
                        {
                            $cuerpo.="<tr align=center style='font-weight:bold' bgcolor='white'>";
                            $cuerpo.="<td align=center>$line[nombre]</td>";
                            $cuerpo.="<td align=center>$line[fecha_compra]</td>";
                            $cuerpo.="<td align=center>$line[fecha_vencimiento]</td>";
                            $cuerpo.="<td align=center>$line[descripcion]</td>";
                            if ($line['tipo']=='l')
                            {
                                $cuerpo.="<td align=center>Licencia</td>";
                            }elseif ($line['tipo']=='s')
                            {
                                $cuerpo.="<td align=center>Servicio</td>";
                            }
                            $cuerpo.= "<td align=center style=color:#00cc00;> ACTIVO </td>";
                            $cuerpo.="<td align=center>$line[codigo]</td>";
                            $cuerpo.="<td align=center>$line[primer_nombre] $line[primer_apellido]</td>";
                            $cuerpo.="</tr><br><br>";
                        }elseif($fecha_venc>=$hoy && $fecha_venc <=$mes)
                        {   
                            $cuerpo.="<tr align=center style='font-weight:bold' bgcolor='white'>";
                            $cuerpo.="<td align=center>$line[nombre]</td>";
                            $cuerpo.="<td align=center>$line[fecha_compra]</td>";
                            $cuerpo.="<td align=center>$line[fecha_vencimiento]</td>";
                            $cuerpo.="<td align=center>$line[descripcion]</td>";
                            if ($line['tipo']=='l')
                            {
                                $cuerpo.="<td align=center>Licencia</td>";
                            }elseif ($line['tipo']=='s')
                            {
                                $cuerpo.="<td align=center>Servicio</td>";
                            }
                            $cuerpo.= "<td align=center style=color:#ff8000;> POR VENCER </td>";
                            $cuerpo.="<td align=center>$line[codigo]</td>";
                            $cuerpo.="<td align=center>$line[primer_nombre] $line[primer_apellido]</td>";
                            $cuerpo.="</tr><br><br>";
                        }elseif($fecha_venc<$hoy)
                        {
                            $cuerpo.="<tr align=center style='font-weight:bold' bgcolor='white'>";
                            $cuerpo.="<td align=center>$line[nombre]</td>";
                            $cuerpo.="<td align=center>$line[fecha_compra]</td>";
                            $cuerpo.="<td align=center>$line[fecha_vencimiento]</td>";
                            $cuerpo.="<td align=center>$line[descripcion]</td>";
                            if ($line['tipo']=='l')
                            {
                                $cuerpo.="<td align=center>Licencia</td>";
                            }elseif ($line['tipo']=='s')
                            {
                                $cuerpo.="<td align=center>Servicio</td>";
                            }
                            $cuerpo.= "<td align=center style=color:red;> VENCIDO </td>";
                            $cuerpo.="<td align=center>$line[codigo]</td>";
                            $cuerpo.="<td align=center>$line[primer_nombre] $line[primer_apellido]</td>";
                            $cuerpo.="</tr><br><br>";
                        }                   

                    }//while  

                    $fin="</table>";
                    if(!empty($cuerpo))
                    {
                        $html=$titulo.$inicio.$cuerpo.$fin;
                      //  echo $html1."<br>";
                    }
                    
	    }
	    // Liberando el conjunto de resultados
	    pg_free_result($result);
	    
	    // Cerrando la conexión
	    pg_close($conecta);
        return $html;
		
		
    }
}
