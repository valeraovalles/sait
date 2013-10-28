<?php

$conexion=pg_connect("host=localhost dbname=sait user=postgres password=postgres");
pg_query("SET NAMES 'utf8'");

$dir="/home/jhoan/www/Fotos/fotos-cedula";

/*if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        $cont=1;
        while (($file = readdir($dh)) !== false) {
        	if($file!='.' and $file!='..'){
            	$archivo=explode(".", $file);
                $nombres=explode(" ", $archivo[0]);

                $query="select * from usuarios.perfil where primer_nombre ILIKE '%".$nombres[0]."%' and primer_apellido ILIKE '%".$nombres[1]."%'";

                $rs = pg_query($conexion,$query);
                while($row=pg_fetch_array($rs)){  
          
                    rename($dir."/".$file, $dir."/".$row['cedula'].'.JPG');
                    //echo '<body oncontextmenu="return false" onkeydown="return false">'.$file.' cedula:'.$row['cedula'].'<img width=25px src="/Fotos/fotos-cedula/'.$file.'"></body><br>';
                }
            }
            $cont++;
        }
        closedir($dh);
    }
}*/


$dir="/home/jhoan/www/Fotos/fotos-cedula";

$conexion=pg_connect("host=192.168.3.43 dbname=sigefirrhh user=postgres password=postgres");
pg_query("SET NAMES 'utf8'");



if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        $cont=1;
        echo '<body oncontextmenu="return false" onkeydown="return false"><table><tr><td>Nombre y Apellido</td><td>Dependencia</td><td>Imagen</td></tr>';
        while (($file = readdir($dh)) !== false) {
            if($file!='.' and $file!='..'){
                $archivo=explode(".", $file);
                $query="select * from personal p, trabajador t, dependencia d where t.cedula='".$archivo[0]."' and p.id_personal=t.id_personal and t.estatus='A' and t.id_dependencia=d.id_dependencia";

                $rs = pg_query($conexion,$query);
                while($row=pg_fetch_array($rs)){  
          
                    //rename($dir."/".$file, $dir."/".$row['cedula'].'.JPG');
                    echo '
                        <tr>
                            <td>'.$row['primer_nombre'].' '.$row['primer_apellido'].'</td>
                            <td>'.$row['nombre'].'</td>
                            <td><img width=60px src="/Fotos/fotos-cedula/'.$file.'"></td>
                        </tr>
                    ';
                }
            }
            $cont++;
        }
        echo '</table></body>';
        closedir($dh);
    }
}
?>

