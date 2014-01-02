<?php 

	function sigefirrhh() {

		$user = 'postgres';
		$passwd = '';
		$db = 'sigefirrhh';
		$port = 5432;
		$host = '192.168.3.43';
		$strCnx = "host=$host port=$port dbname=$db user=$user password=$passwd";
		$cnx = pg_connect($strCnx) or die ("Error de conexion. ". pg_last_error());
		return $cnx;
		};


	function local() {

		$use  = 'postgres';
		$passw = '..*t3l35ur*..';
		$d = 'sait';
		$por = 5432;
		$hos = 'localhost';
		$strCn = "host=$hos port=$por dbname=$d user=$use password=$passw";
		$cn = pg_connect($strCn) or die ("Error de conexion. ". pg_last_error());
		return $cn;
		};




?>
