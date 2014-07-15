<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<?php
	# Cambie estos datos por los de su Servidor FTP
	//define("SERVER","10.10.2.243"); //IP o Nombre del Servidor
    define("SERVER","192.168.40.3"); //IP o Nombre del Servidor  
	define("PORT",21); //Puerto
	define("USER","fork"); //Nombre de Usuario
	define("PASSWORD","fork"); //Contraseña de acceso
        //define("USER","jhoan"); //Nombre de Usuario
	//define("PASSWORD","123456"); //Contraseña de acceso



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
        
    function eliminar_acentos($str){
    	$a = array('Á','É','Í','Ó','Ú');
    	$b = array('A','E','I','O','U');
    	return str_replace($a, $b, $str);
    }

?>


<?php


$file = file_get_contents ("ftp://fork:fork@192.168.40.3/Rename/");
if (!$file) {
    echo "<p>Imposible abrir el archivo remoto.\n";
    exit;
}
while (!feof ($file)) {
    $line = fgets ($file, 1024);
    /* Esto solo trabaja si el titulo y sus tags estan en una línea */
    if (preg_match ("@\<title\>(.*)\</title\>@i", $line, $out)) {
        $title = $out[1];
        break;
    }
}
fclose($file);
die;




//conecto a la bd de mysqlserver
$link = mssql_connect('192.168.70.7', 'sa', '') or die("Could not connect !");
$selected = mssql_select_db("creatv_data", $link);

//////////////////////////////////GENERO XML

//tipo contenido, contenido, produccion
$query="
  select DISTINCT (p.IdProduccio),  
	tc.IdTipoPrograma as idtipoprograma_tc, tc.Descripcio as descripcion_tc,  tc.IdentificadorTP as identificador_tc, 
	c.Titol_Emissio as titulo_contenido, c.Identificador as identificador_contenido,
	p.IdProduccio,p.Titol_Emissio as titulo_produccion, p.Identificador as identificador_produccion, p.Observacions as produccion_observacion, p.Sinopsis
	
  from 
        [creatv_data].[dbo].[TipoContenido] tc, [creatv_data].[dbo].[Contenido] c, [creatv_data].[dbo].[Produccion] p, [creatv_data].[dbo].[Xml] x
  where
        tc.IdTipoPrograma=c.IdTipusPrograma and
        c.IdPrograma=p.IdPrograma and
        x.IdProduccion=p.IdProduccio and
        x.Fecha='".date('Y-m-d')."'
  order by p.IdProduccio ASC
";

$result = mssql_query($query);

$cont=0;
$xml_cab='<?xml version="1.0" encoding="UTF-8" ?>';

while($row = mssql_fetch_array($result)){  
       
    $xml="        
        <XML>
            <Content>UPDATE</Content>
            <Clip>
                <ClipName>".$row['identificador_produccion']."</ClipName>
                <TipoContenido>".utf8_encode($row['descripcion_tc'])."</TipoContenido>
                <Contenido><![CDATA[ ".utf8_encode($row['titulo_produccion'])."]]></Contenido>
                <OriginalTitle></OriginalTitle>
                <Description> </Description>
                <Notes>a</Notes>
                <DurPrev></DurPrev>
                <Chapter></Chapter>
                <EndDate></EndDate>
                <EPG></EPG>
                <EPG_Content> </EPG_Content>
                <Segments>
            ";
    
        $querys="
            select s.NumOrdre as segmento
            from 
                [creatv_data].[dbo].[Segmento] s
            where
		s.IdProduccio=".$row['IdProduccio']." order by s.NumOrdre ASC
        ";  
        
        //obtengo la cantidad de segmentos
        $seg='';
        $results = mssql_query($querys);
        while($rows = mssql_fetch_array($results)){
            $seg=$rows['segmento'];
        }
        
        //genero el xml con la sección de segmentos que necesita xsan
        $queryx="
            select s.Durada as duracion, s.IdMedia, s.NumOrdre as segmento
            from 
                [creatv_data].[dbo].[Segmento] s
            where
		s.IdProduccio=".$row['IdProduccio']."
        ";  
        $resultx = mssql_query($queryx);
        while($rowx = mssql_fetch_array($resultx)){
            
            //identifico a que placeholder va cada tipo de contenido
            $PLACEHOLDER='';
            if(utf8_encode($row['descripcion_tc'])=='INFORMATIVOS PROGRAMAS' || utf8_encode($row['descripcion_tc'])=='DOCUMENTALES' || utf8_encode($row['descripcion_tc'])=='ESPECIALES' || utf8_encode($row['descripcion_tc'])=='NOTICIEROS' || utf8_encode($row['descripcion_tc'])=='SERIES' || utf8_encode($row['descripcion_tc'])=='UNITARIOS') $PLACEHOLDER='PROGRAMA';
            else if(utf8_encode($row['descripcion_tc'])=='BUMPERS' || utf8_encode($row['descripcion_tc'])=='PROMOS CAPITULARES' || utf8_encode($row['descripcion_tc'])=='PROMOS CAPSULAS' || utf8_encode($row['descripcion_tc'])=='PROMOS CARTELERA' || utf8_encode($row['descripcion_tc'])=='PROMOS EFEMÉRIDES' || utf8_encode($row['descripcion_tc'])=='PROMOS ESPECIALES' || utf8_encode($row['descripcion_tc'])=='PROMOS GENERICAS' || utf8_encode($row['descripcion_tc'])=='PROMOS GRAN ESTRENO' || utf8_encode($row['descripcion_tc'])=='PROMOS INDENTIDAD' || utf8_encode($row['descripcion_tc'])=='PROMOS INSTITUCONALES' || utf8_encode($row['descripcion_tc'])=='PROMOS MUY PRONTO' || utf8_encode($row['descripcion_tc'])=='CONTEO') $PLACEHOLDER='PROMO';
            else if(utf8_encode($row['descripcion_tc'])=='PATROCINIOS') $PLACEHOLDER='PATROCINIO';
            
            //genero los segmentos que van al inicio del titulo
            if(!empty($seg))
            $segmento_programa=utf8_encode($rowx['segmento'])."-".$seg." ";
            else $segmento_programa='';
            
            $xml .="
                <Segment>
                    <SegTitle>".str_replace(array('Á','É','Í','Ó','Ú'),array('A','E','I','O','U'),$segmento_programa.utf8_encode($row['titulo_contenido']." - ".$row['titulo_produccion']))."</SegTitle>
                    <MediaID>".$rowx['IdMedia']."</MediaID>
                    <Duration>".$rowx['duracion']."</Duration>
                    <SegNumber>".$rowx['segmento']."</SegNumber>
                    <ClipGroup>".$PLACEHOLDER."</ClipGroup>
                    <Description>".str_replace(array('Á','É','Í','Ó','Ú','á','é','í','ó','ú'),array('A','E','I','O','U','a','e','i','o','u'),utf8_encode($row['Sinopsis']))."</Description>
                </Segment>
            ";
            
        }
        
    //uno las secciones del xml
    $xml_final=$xml_cab.$xml."</Segments></Clip></XML>";
    
    $xml_final=  eliminar_acentos($xml_final);    

    
    //envío el archivo por ftp
    $archivo = fopen ("/var/www/Telesur/web/uploads/creatv/xml/".$row["identificador_produccion"].".xml", "w+");
    //$archivo = fopen ("/home/jhoan/www/Telesur/web/uploads/creatv/xml/".$row["identificador_produccion"].".xml", "w+");
    fwrite($archivo, $xml_final);
    fclose($archivo);
    
    SubirArchivo("/var/www/Telesur/web/uploads/creatv/xml/".$row["identificador_produccion"].".xml",$row["identificador_produccion"].".xml");
    //SubirArchivo("/home/jhoan/www/Telesur/web/uploads/creatv/xml/".$row["identificador_produccion"].".xml",$row["identificador_produccion"].".xml");

        
}
    
?>
