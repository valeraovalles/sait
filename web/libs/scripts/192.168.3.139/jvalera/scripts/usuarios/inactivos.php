<?php

	header('Content-Type: text/html; charset=UTF-8');
	include("conexion.php");

	//CONEXIONES A BASEDE DATOS/////////////////////////////////////////////////////
	$conexion=new Conexion();
	$postgresql_local=$conexion->postgresql_local();
	$postgresql_sigefirrhh=$conexion->postgresql_sigefirrhh();

	//EXTRAER DATOS DE SIGEFIRRHH
	$query="select * from personal p, trabajador t where p.id_personal=t.id_personal and t.estatus='A'";
	$rs = pg_query($postgresql_sigefirrhh,$query);
	while($row=pg_fetch_array($rs)){  
		$cedulas[]=$row['cedula'];
	}

	//EXTRAER DATOS DE SAIT
	$query="select * from usuarios.user u, usuarios.perfil p where p.user_id=u.id";
	$rs = pg_query($postgresql_local,$query);
	$cont=0;
	$cont2=0;
	while($row=pg_fetch_array($rs)){  

		if(in_array($row['cedula'], $cedulas)==false) {
				$query="update usuarios.user set is_active=false where id=".$row['id']." and is_active=true and fueradenomina=false";
				if(pg_query($postgresql_local,$query))$cont++;				
		}
		else{
				$query="update usuarios.user set is_active=true where id=".$row['id']." and is_active=false";
				if(pg_query($postgresql_local,$query))$cont2++;						
		}
	}

	echo "SE DESACTIVARON ".$cont."\r\n";
	echo "SE ACTIVARON ".$cont2."\r\n";
	echo date("G:i:s");
	?>
