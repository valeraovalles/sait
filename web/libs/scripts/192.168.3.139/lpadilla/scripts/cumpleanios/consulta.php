<?php  

include('conex.php');
require_once('htmlMimeMail5/htmlMimeMail5.php');

$sige = sigefirrhh();
$local = local();


$dia=date('d');
$mes=date('m');

//$imgind = "http://192.168.3.139/cumple/individual.jpg";  //ruta imagen
$imgind = "http://exwebserv.telesurtv.net/Tarjetas/individual.jpg"; //ruta imagen


//CONSULTA SIGEFIRRHH
$conssige = "SELECT a.cedula, a.primer_nombre, a.primer_apellido, date_part('day',a.fecha_nacimiento) as dia, 
date_part('month',a.fecha_nacimiento) as mes, b.nombre as dependencia from personal a, trabajador c, dependencia b 
where b.id_dependencia = c.id_dependencia and a.id_personal = c.id_personal and c.estatus = 'A' 
and date_part('day',a.fecha_nacimiento) ='".$dia."' and date_part('month',a.fecha_nacimiento) ='".$mes."' ";
$resultsige = pg_query($sige, $conssige) or die('La consulta fallo: ' . pg_last_error());

//CONSULTA SAIT
$conssait="
    SELECT cedpas, nombre, apellido, date_part('day',fechanac) as dia, 
    date_part('month',fechanac) as mes, ubicacion from cumpleanios.personal 
    where date_part('day',fechanac) ='".$dia."'  and date_part('month',fechanac) ='".$mes."'
    ";
$resultsait = pg_query($local, $conssait) or die('La consulta fallo: ' . pg_last_error());


$existe=0;
$gen="<table style='width:470px;height:360px;' border='0' >";

    //EXTRAIGO CUMPLEAÑEROS DE SIGEFIRRHH
    while ($line = pg_fetch_array($resultsige, null, PGSQL_ASSOC)) {
            $cedula=$line['cedula'];
            $primer_nombre=$line['primer_nombre'];
            $primer_apellido=$line['primer_apellido'];
            $dependencia=$line['dependencia'];


        $gen.= "<tr><td style='font-size:11.5px;text-align:center;font-family:Arial;padding:5px;'><b>".$primer_nombre." ".$primer_apellido."</b><br>".$dependencia."</td>";

    // CORREO INDIVIDUAL
    $cons2 = "SELECT p.cedula, u.username from usuarios.user u, usuarios.perfil p where u.id = p.user_id and p.cedula='".$cedula."' ";
    $resultado = pg_query($local, $cons2) or die('La consulta fallo: ' . pg_last_error()); 
    $ind="";

    $line2 = pg_fetch_array($resultado, null, PGSQL_ASSOC);
    $html ="
        <div style='top:20px;left:5px;position:relative;z-index:1;'><img src=".$imgind." width='300px' height='450px'></div>
        <div style='position:absolute;left:15px; width:300px; top:370px;z-index:2;'>
    	    <div style='font-size:14px; font-weight:bold;' align='center'>".$primer_nombre." ".$primer_apellido."</div>
        </div>
    ";

        $mail = new htmlMimeMail5();
         //Establecemos el remitente
        $mail->setFrom("FELICITACIONES TELESUR <aplicaciones@telesurtv.net>");
       //Establecemos el asunto que en este caso será lo que se enviara por mensaje de texto
        $mail->setSubject("FELIZ CUMPLEANOS"); 
         //Establecemos el texto del mensaje de correo, para los mensajes de texto IMOLKO toma el asunto del mensaje, no el contenido!!!
        $mail->setText('FELICIDADES');
        $mail->setHtml($html); 
        $mail->setSMTPParams('correo.telesurtv.net', 25, null, true,'aplicaciones@telesurtv.net', '4pl1c4c10n35');
        $mail->send(array($line2['username'].'@telesurtv.net'), 'smtp');
        //$mail->send(array('jvalera@telesurtv.net'), 'smtp');
    // FIN CORREO INDIVIDUAL

        $existe=1;
    }

    //EXTRAIGO CUMPLEAÑEROS DE SAIT
    while ($line = pg_fetch_array($resultsait, null, PGSQL_ASSOC)) {
            $cedula=$line['cedpas'];
            $primer_nombre=$line['nombre'];
            $primer_apellido=$line['apellido'];
            $dependencia=$line['ubicacion'];


        $gen.= "<tr><td style='font-size:11.5px;text-align:center;font-family:Arial;padding:5px;'><b>".$primer_nombre." ".$primer_apellido."</b><br>".$dependencia."</td>";

        $existe=1;
    }

$gen .="</table>";


if($existe==0){
//enviar correo si no hay cumpleañeros
    $mail = new htmlMimeMail5();
     //Establecemos el remitente
    $mail->setFrom("NO EXSISTEN CUMPLEANEROS PARA HOY ".$dia."-".$mes." <cumpleanos_telesur@telesurtv.net>");
   //Establecemos el asunto que en este caso será lo que se enviara por mensaje de texto
    $mail->setSubject("NO EXISTEN CUMPLEANEROS PARA HOY ".$dia."-".$mes); 
    $mail->setHtml("No existen cumpleaneros para el dia de hoy"); 
    $mail->setSMTPParams('correo.telesurtv.net', 25, null, true,'aplicaciones@telesurtv.net', '4pl1c4c10n35');
    $mail->send(array('aplicaciones@telesurtv.net'), 'smtp');

die;

}


 //CORREO GENERAL INICIO

//$img = "http://192.168.3.139/cumple/tarjeta.jpg";  //ruta imagen general
$img = "http://exwebserv.telesurtv.net/Tarjetas/tarjeta.jpg"; //ruta imagen general

$html ="<html><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8'/></head><body><div style='top:20px;left:5px;position:relative;z-index:1;'><img src=".$img." width='1050px' height='750px'></div><div style='width:470px;height:360px;position:absolute;left:550px;top:160px;z-index:2;'>".$gen."</div></body></html>";

    $mail = new htmlMimeMail5();
     //Establecemos el remitente
    $mail->setFrom("FELICITACIONES TELESUR <cumpleanos_telesur@telesurtv.net>");
    //Establecemos el asunto que en este caso será lo que se enviara por mensaje de texto
    $mail->setSubject("FELIZ CUMPLEANOS"); 
     //Establecemos el texto del mensaje de correo, para los mensajes de texto IMOLKO toma el asunto del mensaje, no el contenido!!!
    $mail->setText('FELICIDADES');
    $mail->setHtml($html); 
    $mail->setSMTPParams('correo.telesurtv.net', 25, null, true,'aplicaciones@telesurtv.net', '4pl1c4c10n35');
    $mail->setBCC('distribucion-todostelesur2013@telesurtv.net');
    //$mail->setBCC('jvalera@telesurtv.net');
    $em='';
    $mail->send(array($em), 'smtp');
 //CORREO GENERAL FIN

?>














<?php
//comprobar el día siguiente
$dia=$dia+1;
if($dia>date('t')){
	$dia=1;
	$mes=$mes+1;
	if($mes==12)$mes=1;
}


//$imgind = "http://192.168.3.139/cumple/individual.jpg";  //ruta imagen
$imgind = "http://exwebserv.telesurtv.net/Tarjetas/individual.jpg"; //ruta imagen


//CONSULTA SIGEFIRRHH
$conssige = "SELECT a.cedula, a.primer_nombre, a.primer_apellido, date_part('day',a.fecha_nacimiento) as dia, 
date_part('month',a.fecha_nacimiento) as mes, b.nombre as dependencia from personal a, trabajador c, dependencia b 
where b.id_dependencia = c.id_dependencia and a.id_personal = c.id_personal and c.estatus = 'A' 
and date_part('day',a.fecha_nacimiento) ='".$dia."' and date_part('month',a.fecha_nacimiento) ='".$mes."' ";
$resultsige = pg_query($sige, $conssige) or die('La consulta fallo: ' . pg_last_error());

//CONSULTA SAIT
$conssait="
    SELECT cedpas, nombre, apellido, date_part('day',fechanac) as dia, 
    date_part('month',fechanac) as mes, ubicacion from cumpleanios.personal 
    where date_part('day',fechanac) ='".$dia."'  and date_part('month',fechanac) ='".$mes."'
    ";
$resultsait = pg_query($local, $conssait) or die('La consulta fallo: ' . pg_last_error());

$existe=0;
$gen="<table style='width:470px;height:360px;' border='0' >";

    while ($line = pg_fetch_array($resultsige, null, PGSQL_ASSOC)) {
            $cedula=$line['cedula'];
            $primer_nombre=$line['primer_nombre'];
            $primer_apellido=$line['primer_apellido'];
            $dependencia=$line['dependencia'];


    $gen.= "<tr><td style='font-size:11.5px;text-align:center;font-family:Arial;padding:5px;'><b>".$primer_nombre." ".$primer_apellido."</b><br>".$dependencia."</td>";


    // CORREO INDIVIDUAL
    $cons2 = "SELECT p.cedula, u.username from usuarios.user u, usuarios.perfil p where u.id = p.user_id and p.cedula='".$cedula."' ";
    $resultado = pg_query($local, $cons2) or die('La consulta fallo: ' . pg_last_error()); 
    $ind="";

    $line2 = pg_fetch_array($resultado, null, PGSQL_ASSOC);
    $html ="
        <div style='top:20px;left:5px;position:relative;z-index:1;'><img src=".$imgind." width='300px' height='450px'></div>
        <div style='position:absolute;left:15px; width:300px; top:370px;z-index:2;'>
            <div style='font-size:14px; font-weight:bold;' align='center'>".$primer_nombre." ".$primer_apellido."</div>
        </div>
    ";


        $mail = new htmlMimeMail5();
         //Establecemos el remitente
        $mail->setFrom("VERIFICACION CUMPLEANOS ".$dia."-".$mes." <cumpleanos_telesur@telesurtv.net>");
       //Establecemos el asunto que en este caso será lo que se enviara por mensaje de texto
        $mail->setSubject("VERIFICACION CUMPLEANOS ".$dia."-".$mes); 
         //Establecemos el texto del mensaje de correo, para los mensajes de texto IMOLKO toma el asunto del mensaje, no el contenido!!!
        $mail->setText("VERIFICACION CUMPLEANOS ".$dia."-".$mes);
        $mail->setHtml($html); 
        $mail->setSMTPParams('correo.telesurtv.net', 25, null, true,'aplicaciones@telesurtv.net', '4pl1c4c10n35');
        $mail->send(array('aplicaciones@telesurtv.net'), 'smtp');
    // FIN CORREO INDIVIDUAL

        $existe=1;
    }

    //EXTRAIGO CUMPLEAÑEROS DE SAIT
    while ($line = pg_fetch_array($resultsait, null, PGSQL_ASSOC)) {
            $cedula=$line['cedpas'];
            $primer_nombre=$line['nombre'];
            $primer_apellido=$line['apellido'];
            $dependencia=$line['ubicacion'];


        $gen.= "<tr><td style='font-size:11.5px;text-align:center;font-family:Arial;padding:5px;'><b>".$primer_nombre." ".$primer_apellido."</b><br>".$dependencia."</td>";

        $existe=1;
    }

$gen .="</table>";

if($existe==0){die;}

 //CORREO GENERAL INICIO

//$img = "http://192.168.3.139/cumple/tarjeta.jpg";  //ruta imagen general
$img = "http://exwebserv.telesurtv.net/Tarjetas/tarjeta.jpg"; //ruta imagen general

$html ="<html><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8'/></head><body><div style='top:20px;left:5px;position:relative;z-index:1;'><img src=".$img." width='1050px' height='750px'></div><div style='width:470px;height:360px;position:absolute;left:550px;top:160px;z-index:2;'>".$gen."</div></body></html>";

    $mail = new htmlMimeMail5();
     //Establecemos el remitente
    $mail->setFrom("VERIFICACION CUMPLEANOS ".$dia."-".$mes." <cumpleanos_telesur@telesurtv.net>");
    //Establecemos el asunto que en este caso será lo que se enviara por mensaje de texto
    $mail->setSubject("VERIFICACION CUMPLEANOS ".$dia."-".$mes); 
     //Establecemos el texto del mensaje de correo, para los mensajes de texto IMOLKO toma el asunto del mensaje, no el contenido!!!
    $mail->setText("VERIFICACION CUMPLEANOS ".$dia."-".$mes);
    $mail->setHtml($html); 
    $mail->setSMTPParams('correo.telesurtv.net', 25, null, true,'aplicaciones@telesurtv.net', '4pl1c4c10n35');
    $mail->setBCC('aplicaciones@telesurtv.net');
    $em='';
    $mail->send(array($em), 'smtp');
 //CORREO GENERAL FIN
