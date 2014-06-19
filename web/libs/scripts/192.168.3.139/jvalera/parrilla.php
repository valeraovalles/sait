<?php

    function principio_semana()
    {
    $unix = date ("U"); /// esto nos convierte la fecha de hoy en Unix
    switch (date ("w")) /// segun el dia de la semana damos un valor en seg a $dia
    {
                  
    case 0:
         $dia = 518400;
         break;
    case 1:
         $dia = 0;
         break;
    case 2:
         $dia = 86400;
         break;
    case 3:
         $dia = 172800;
         break;
    case 4:
         $dia = 259200;
         break;
    case 5:
         $dia = 345600;
         break;
    case 6:
         $dia = 432000;
         break;
    }//switch
    $inicio_semana = ($unix - $dia); ///restamos la fecha de hoy con $dia y nos dara la fecha del lunes pasado
    $lunes_pasado = date ("Y-m-d",$inicio_semana); ///pasamos la fecha en unix a el formato normal
    return $lunes_pasado;
    }//function


    function final_semana()
    {
            $unix = date("U"); /// esto nos convierte la fecha de hoy en Unix
            switch (date("w")) /// segun el dia le damos un valor en segundos a $dia
            {
                    case 0:
                        $dia = 0;
                        break;
                    case 1:
                        $dia = 518400;
                    break;
               case 2:
                        $dia = 432000;
                        break;
                    case 3:
                        $dia = 345600;
                        break;
               case 4:
                        $dia = 259200;
                        break;
               case 5:
                        $dia = 172800;
                        break;
                    case 6:
                        $dia = 86400;
                        break;
            }//switch
            $final_semana = ($unix + $dia); ///sumamos la fecha de hoy con $dia y nos dara la fecha del domingo proximo
            $domingo_proximo = date("Y-m-d",$final_semana); ///pasamos la fecha en unix a el formato normal
            return $domingo_proximo;
    }


    $lunes= principio_semana();
    $domingo=final_semana();


	# Cambie estos datos por los de su Servidor FTP
  define("SERVER","10.10.11.243"); //IP o Nombre del Servidor  
	define("PORT",21); //Puerto
	define("USER","jhoan"); //Nombre de Usuario
	define("PASSWORD","123456"); //Contraseña de acceso


	# FUNCIONES
	function ConectarFTP(){
		//Permite conectarse al Servidor FTP
		$id_ftp=ftp_connect(SERVER,PORT); //Obtiene un manejador del Servidor FTP
		ftp_login($id_ftp,USER,PASSWORD); //Se loguea al Servidor FTP
		return $id_ftp; //Devuelve el manejador a la función
	}

	function SubirArchivo($archivo_local,$archivo_remoto){
		//Sube archivo de la maquina Cliente al Servidor (Comando PUT)
		$id_ftp=ConectarFTP(); //Obtiene un manejador y se conecta al Servidor FTP
		ftp_put($id_ftp,$archivo_remoto,$archivo_local,FTP_BINARY);
		//Sube un archivo al Servidor FTP en modo Binario
		ftp_quit($id_ftp); //Cierra la conexion FTP
	}
        
    //muestra el dia de la sdemana de una fecha dada
    function diasemana($ano,$mes,$dia)
    {
        // 0->domingo    | 6->sabado
        $dia= date("w",mktime(0, 0, 0, $mes, $dia, $ano));
            return $dia;
    }

    //redondeo la hora de inicio del programa ya que no es exacta
    function rendondearhorainicio($tiempo){
        $tiempo =explode(":",$tiempo);
        $hora=$tiempo[0];
        $minuto=$tiempo[1];
        $segundo='00';

        if($minuto<30) $minuto='00';
        else $minuto='30';
        return $hora.":".$minuto.":".$segundo;
    }

    //sumo hora inicio con el redondeo de final para calcular el tiempo final
    function sumar($h1,$h2)
    {
        $h2h = date('H', strtotime($h2));
        $h2m = date('i', strtotime($h2));
        $h2s = date('s', strtotime($h2));
        $hora2 =$h2h." hour ". $h2m ." min ".$h2s ." second";
         
        $horas_sumadas= $h1." + ". $hora2;
        $text=date('H:i:s', strtotime($horas_sumadas)) ;
        return $text;
     
    }

    //redondeo la hora final del programa ya que no es exacta
    function rendondearhorafin($tiempoinicio,$tiempofin){

        $tiempofin =explode(":",$tiempofin);
            $horafin=$tiempofin[0];
            $minutofin=$tiempofin[1];
            $segundofin=00;


        //si solo hay que aumentar media hora entonces aumento una hora y el minuto es 00
        if($minutofin<30)
            $minutofin=30;
        else{
            $minutofin=00;
            $horafin=$horafin+1;
        }

        $tiempofin= sumar($tiempoinicio,$horafin.":".$minutofin.":".$segundofin);

        return $tiempofin;
    }

    //conecto a la bd de mysqlserver
    $link = mssql_connect('192.168.70.7', 'sa', '') or die("Could not connect !");
    $selected = mssql_select_db("creatv_data", $link);


    //////////////////////////////////GENERO XML

    //tipo contenido, contenido, produccion
    $query="
      SELECT pa.Data_Inici, pa.Data_Fi, es.Data_Emissio, pr.Identificador, ev.StartTime, co.Titol_Emissio, pr.Sinopsis as sipnopsisprod, co.Sinopsis as sinopsiscon, ev.Logo, ev.Logo1, co.IdPrograma, co.Durada
      FROM [creatv_data].[dbo].[Escaleta] es, [creatv_data].[dbo].[Evento] ev, [creatv_data].[dbo].[Parrilla] pa, [creatv_data].[dbo].[Produccion] pr, [creatv_data].[dbo].[Contenido] co
      where 
      pa.Data_Inici='".$lunes."' and
      pa.Data_Fi='".$domingo."' and
      pa.IdCanal=10 and
      --es.IdParrilla='443' and 
      --ev.Nivel=1 and
      --ev.IdSubContenidorExtern=-1 and
      ev.SegName!='1/1' and
      ev.IdEscaleta=es.IdEscaleta and 
      pa.IdParrilla=es.IdParrilla and
      ev.IdProduccio=pr.IdProduccio and
      co.IdPrograma=pr.IdPrograma
      ORDER by es.Data_Emissio, ev.OrderNum ASC 
    ";

    $result = mssql_query($query);

    //saco lunes aparte porque no puedo calcular la cantidad en el while por estar de primero
    $querylunes="
      SELECT es.Data_Emissio, ev.IdBloc
      FROM [creatv_data].[dbo].[Escaleta] es, [creatv_data].[dbo].[Evento] ev, [creatv_data].[dbo].[Parrilla] pa
      where 
      es.Data_Emissio='".$lunes."' and
      pa.IdCanal=10 and
      ev.SegName!='1/1' and
      ev.IdEscaleta=es.IdEscaleta and 
      pa.IdParrilla=es.IdParrilla 
      group by es.Data_Emissio, ev.IdBloc";
    $resultlunes = mssql_query($querylunes);
    $cont=0; while(mssql_fetch_array($resultlunes)) $cont++; 


//comienzo a armar el xml
$xml='<?xml version="1.0" encoding="UTF-8" ?>
    <root>
        <semana>';

$dias=array('1'=>'lunes','2'=>'martes','3'=>'miercoles','4'=>'jueves','5'=>'viernes','6'=>'sabado','0'=>'domingo');
$idprograma=0; //para no repetir el programa
$diaanterior=0; //para no repetir el dia
$da=null; //variable para indicar que la etiqueta de cierre del lunes no debe mostrarla al principio

while($row = mssql_fetch_array($result)){  

//para que no se repita el programa
if($idprograma!=$row['IdPrograma']){

    //separo los milisengundos de la hora
    $horainicio=explode(".",$row['StartTime']);
    $horainicio=rendondearhorainicio($horainicio[0]);

    //separo los milisengundos de la hora
    $horafin=explode(".",$row['Durada']);
    $horafin=rendondearhorafin($horainicio,$horafin[0]);

    //consulto la fecha de emision para calcular la cantidad de programas por dia
    $fechaemision=explode("-", $row['Data_Emissio']);
    $diasemana=diasemana($fechaemision[0],$fechaemision[1],$fechaemision[2]);

    if($diaanterior!=$diasemana){
        
        //cierro la etiqueda de dia y programas
        if($da!=null){
            $xml .= "
                </programas>
            </".$da."> ";            
        }

        //abro la etiqueta de dia y programa
        $xml .= "
            <".$dias[$diasemana]." cuantos='".$cont."'>
                <programas>";

        $da=$dias[$diasemana];
        $cont=0; //contar el nulero de programas por dia
    }

    $xml .="        
                    <programa id='".$row['IdPrograma']."'>
                        <nombre>".utf8_encode($row['Titol_Emissio'])."</nombre>
                        <sinopsis>".utf8_encode($row['sinopsiscon'])."</sinopsis>
                        <foto>".$row['Logo']."</foto>
                        <url>".$row['Logo1']."</url>
                        <hora_ini>".str_replace("-", "/", $row['Data_Emissio'])." ".$horainicio."</hora_ini>
                        <hora_fin>".str_replace("-", "/", $row['Data_Emissio'])." ".$horafin."</hora_fin>
                    </programa>";
    $cont++;
    }

    $idprograma=$row['IdPrograma'];
    $diaanterior=$diasemana;
}
    $xml .="        
                </programas>
            </domingo> 
        </semana>
    </root>";    
    
    //$nombre=str_replace("-", "", $lunes).'-'.str_replace("-", "", $domingo);
    $nombre="xmltv.xml";

    //envío el archivo por ftp
    $archivo = fopen ("/var/www/sait/web/uploads/parrilla/xml/".$nombre.".xml", "w+");

    //$archivo = fopen ("/home/jhoan/www/Telesur/web/uploads/creatv/xml/".$row["identificador_produccion"].".xml", "w+");
    fwrite($archivo, $xml);
    fclose($archivo);

    
    SubirArchivo("/var/www/sait/web/uploads/parrilla/xml/".$nombre,$nombre);
    //SubirArchivo("/home/jhoan/www/Telesur/web/uploads/creatv/xml/".$row["identificador_produccion"].".xml",$row["identificador_produccion"].".xml");
?>