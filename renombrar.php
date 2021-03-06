<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<?php
	# FUNCIONES
	function ConectarFTPA(){
		//Permite conectarse al Servidor FTP
		$id_ftp=ftp_connect("192.168.40.3",21); //Obtiene un manejador del Servidor FTP
		ftp_login($id_ftp,"fork","fork"); //Se loguea al Servidor FTP
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


    // establecer una conexión básica
    $conn_id = ConectarFTPA();
    //me ubico en un directorio
    ftp_chdir($conn_id, "Vantage/Rename");
    // Obtener los archivos contenidos en el directorio actual
    $contents = ftp_nlist($conn_id, ".");
    // output $contents

    //conecto a la bd de mysqlserver
    $link = mssql_connect('192.168.70.7', 'sa', '') or die("Could not connect !");
    $selected = mssql_select_db("creatv_data", $link);


    foreach ($contents as $c) {
        if($c!=".DS_Store" and $c!="._.DS_Store" and $c!='otros'){
            $dato=explode(".", $c);
            $idcoriginal=$dato[0];
            $idrecortado=substr($dato[0],0,-2);
            $ext=$dato[1];

            $query="
              SELECT p.Identificador, c.Titol_Emissio as tcontenido,p.Titol_Emissio as tproduccion
              FROM [creatv_data].[dbo].[Produccion] p ,[creatv_data].[dbo].[Contenido] c 
              where p.IdPrograma=c.IdPrograma and p.Identificador='".$idrecortado."'
            ";

            $result = mssql_query($query);
            $row = mssql_fetch_array($result);
            ftp_rename($conn_id, $idcoriginal.".".$ext, "../From_Interplay/".$row['tcontenido']." - ".$row['tproduccion'].".".$ext);

        }
    }