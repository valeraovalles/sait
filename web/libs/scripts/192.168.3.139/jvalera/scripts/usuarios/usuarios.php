<?php
	header('Content-Type: text/html; charset=UTF-8');
	include("conexion.php");

	//CONEXIONES A BASEDE DATOS/////////////////////////////////////////////////////
	$conexion=new Conexion();
	$postgresql_local=$conexion->postgresql_local();
	$postgresql_sigefirrhh=$conexion->postgresql_sigefirrhh();
	////////////////////////////////////////////////////////////////////////////////

	//CONTAR TRABAJADORES EN SIGEFIRRHH///////////////////////////////////////////// 
	$query="select count(*) as suma from personal p, trabajador t where p.id_personal=t.id_personal and t.estatus='A'";
	$rs = pg_query($postgresql_sigefirrhh,$query);
	$row = pg_fetch_array($rs);
	$sumasgf=$row['suma'];
	////////////////////////////////////////////////////////////////////////////////

	//VERIFICA SI EL USUARIO EXISTE EN LA BASE DE DATOS telesur/////////////////////
	function existeusername($user){
		global $postgresql_local;
		$user=strtolower($user);
		$query="select * from usuarios.user where username='".$user."'";
		$rs = pg_query($postgresql_local, $query);
		$row = pg_fetch_array($rs);
		if($row) return true;
		else return false;        
	}
	/////////////////////////////////////////////////////////////////////////////////

	//VERIFICA SI EL USUARIO EXISTE EN LA BASE DE DATOS telesur/////////////////////
	function existeusuario($cedula){
		global $postgresql_local;
		$query="select * from usuarios.perfil where cedula like '%".$cedula."%'";
		$rs = pg_query($postgresql_local, $query);
		$row = pg_fetch_array($rs);
		if($row) return true;
		else return false;        
	}
	/////////////////////////////////////////////////////////////////////////////////


	//VERIFICA SI EL USUARIO TIENE CUENTA LDAP///////////////////////////////////////
	function cuentaldap($cedula){
		$ds = ldap_connect("192.168.3.5") or die ("No se pudo establecer coneccion con el servidor");
		ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
		$sr=ldap_search($ds,"ou=Personas, dc=telesur", "telephonenumber=".$cedula);	
	    $info = ldap_get_entries($ds, $sr);
        if (isset($info[0]['uid'][0]))
         return strtolower(trim($info[0]['uid'][0]));
        else return null;
	}
	////////////////////////////////////////////////////////////////////////////////


    //SI NO TIENE CUENTA LDAP LE GENERO UN NOMBRE DE USUARIO////////////////////////
	function generauser($n,$a){
		//PRIMERA LETRA DEL NOMBRE + APELLIDO
		$usr=$n[0].$a;	
		$existe=existeusername($usr);
		
		if($existe==true){
			//DOS PRIMERAS LETRAS DEL NOMBRE + APELLIDO
			$usr=$n[0].$n[1].$a;
			$existe=existeusername($usr);
			
			if($existe==true){
				//TRES PRIMERAS LETRAS DEL NOMBRE + APELLIDO
				$usr=$n[0].$n[1].$n[2].$a;
				$existe=existeusername($usr);	

				if($existe==true){
					//TRES PRIMERAS LETRAS DEL NOMBRE + APELLIDO
					$usr=$n[0].$n[1].$n[2].$n[3].$a;
				}	
			}		
		}

		return str_replace(" ","",trim($usr));
	}
	////////////////////////////////////////////////////////////////////////////////


	/////DESACTIVAR EGRESADO

	////

	//EXTRAER DATOS DE SIGEFIRRHH CON LDAP E INSERTARLOS EN TELESUR////////////////
	$query="select * from personal p, trabajador t where p.id_personal=t.id_personal and t.estatus='A'";
	$rs = pg_query($postgresql_sigefirrhh,$query);
	
	echo "\nINSERTANDO Y/O ACTUALIZANDO USUARIOS CON LDAP Y CREANDO ARRAY DE USUARIO SIN LDAP \n\n";

	$contarraysinldap=0;$contuser=0; $contperfil=0;$contuseractualizado=0; $contperfilactualizado=0;$contusernameactualizado=0;$usuariossinldap=null;$porcentaje=0;$contadordeporcentaje=0;
	while($row=pg_fetch_array($rs)){  

	    $cedula = strtoupper(trim($row['cedula']));

	    //VERIFICO EL USUARIO EXISTE EN LA BASE DE DATOS telesur
	    $existeusuario=existeusuario($cedula);

	    //ACTUALIZO USUARIOS
	    if($existeusuario==true){
	    	$userldap=cuentaldap($cedula);
	    	if($userldap!=null){
				$query1="select u.id as iduser from usuarios.perfil p, usuarios.user u where  u.id=p.user_id and p.cedula like '%".$cedula."%'";
				$rs1 = pg_query($postgresql_local, $query1);
				$row1 = pg_fetch_array($rs1);
				//ACTUALIZO EN perfil
	   			$query="update usuarios.user set username='".$userldap."', password=null, salt=null where id=".$row1['iduser'];
	   			if(pg_query($postgresql_local,$query))$contusernameactualizado++;	

	    	}

			//ACTUALIZO EN perfil
   			$query="update usuarios.perfil set primer_nombre='".$row['primer_nombre']."', segundo_nombre='".$row['segundo_nombre']."', primer_apellido='".$row['primer_apellido']."', segundo_apellido='".$row['segundo_apellido']."', fechanacimiento='".$row['fecha_nacimiento']."' where cedula='".$cedula."'";
   			if(pg_query($postgresql_local,$query))$contperfilactualizado++;	
	    } 

	    //INSERTO USUARIOS
	    else if($existeusuario==false){
	    	//VERIFICO SI TIENE CUENTA LDAP
	    	$userldap=cuentaldap($cedula);
	    	//SI EL USUARIO POSEE CUENTA LDAP
	    	if($userldap!=null){
	    		$val="select nextval('usuarios.user_id_seq')";
	    		$val=pg_fetch_array(pg_query($postgresql_local,$val));
	    		pg_query($postgresql_local,"ALTER SEQUENCE usuarios.perfil_id_seq RESTART WITH ".$val['nextval']);

	    		//VERIFICO SI YA EXISTE EL username EN telesur
	       		$existeusername=existeusername($userldap);
	       		if($existeusername==false){
	       			//INSERTO EN user
	       			$query="insert into usuarios.user (id,username, password, is_active) values (".$val['nextval'].",'".strtolower($userldap)."','".md5($cedula)."',true)";
	       			if(pg_query($postgresql_local,$query))$contuser++;

					//INSERTO EN perfil
	       			$query="insert into usuarios.perfil (id,user_id, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, cedula, fechanacimiento) values (".$val['nextval'].",".$val['nextval'].",'".$row['primer_nombre']."','".$row['segundo_nombre']."','".$row['primer_apellido']."','".$row['segundo_apellido']."',$cedula,'".$row['fecha_nacimiento']."')";
	       			if(pg_query($postgresql_local,$query))$contperfil++;

	       			//inserto roll por defecto id 100
	       			$query="insert into usuarios.userrol (user_id, rol_id) values (".$val['nextval'].",100)";
	       			pg_query($postgresql_local,$query);

	       		}
	       		else if($existeusername==true){
	       			//SI EL USUARIO LDAP YA EXISTE, QUIERE DECIR QUE EL USUARIO QUE ESTA EN BD NO POSEE LDAP Y LE FUE ASIGNADO AUTOMATICAMENTE POR EL SCRIPT
	       			//consulto el usuario que posee el username y le genero uno nuevo con su nombre y apellido
					$queryx="select * from usuarios.user u, usuarios.perfil p where p.user_id=u.id and u.username='".$userldap."'";
					$rsx = pg_query($postgresql_local,$queryx);
					$rowx=pg_fetch_array($rsx);
					$user=generauser($rowx['primer_nombre'],$rowx['primer_apellido']);
		    		
		       		$cst="UPDATE usuarios.user set username='".strtolower($user)."' where username='".$userldap."'";
					if(pg_query($postgresql_local,$cst))$contuseractualizado++;
		 
					echo"
	       				<table border=1 cellspacing=0 cellpadding=0>
	       					<tr><td colspan=4 align=center>YA EXIASTIA UN USUARIO CON EL USERNAMELDAP, EL PROBLEMA SERÁ CORREGIDO CUANDO SE CORRA NUEVAMENTE EL SCRIPT</td><tr>
	       					<tr>
	       						<td>USERNAME</td>
	       						<td>CEDULA</td>
	       						<td>NOMBRE</td>
	       						<td>APELLIDO</td>
	       					</tr>
	       				    <tr>
	       						<td>".$userldap."</td>
	       						<td>".$cedula."</td>
	       						<td>".strtoupper($row['primer_nombre'])."</td>
	       						<td>".strtoupper($row['primer_apellido'])."</td>
	       					</tr>
	       				</table>
	       				\n\n
	       			";
	       		}
	    	}

	    	else if($userldap==null){
	    		$usuariossinldap[$contarraysinldap]=$row;
	    		$contarraysinldap++;
	    	}
	    }

	    $porcentajeanterior=$porcentaje;
	    $contadordeporcentaje++;
	    $porcentaje=($contadordeporcentaje*100) / $sumasgf;
	    $porcentaje=number_format($porcentaje,0);
		if($porcentaje!=$porcentajeanterior){
			if(strlen($porcentaje)==1)$porcentaje="0".$porcentaje;
			echo $porcentaje.'% | '; 
			if($porcentaje==20 or $porcentaje==40 or $porcentaje==60 or $porcentaje==80)echo "\n";
		}
	}

	echo "\n\nTOTAL USUARIOS CON LDAP INSERTADOS: ".$contuser."\n";
	echo "TOTAL PERFILES CON LDAP INSERTADOS: ".$contuser."\n\n";

	echo "TOTAL PERFIL ACTUALIZADOS CON O SIN LDAP: ".$contperfilactualizado."\n\n";
	echo "TOTAL USERNAME CAMBIADOS DE USUARIO: ".$contuseractualizado."\n\n";
	echo "TOTAL USUARIOS ACTUALIZADOS CON USERNAME LDAP: ".$contusernameactualizado."\n\n";




	//INSERTO USUARIOS SIN LDAP
	if($usuariossinldap!=null){
		echo "\nINSERTANDO Y/O ACTUALIZANDO USUARIOS SIN LDAP \n\n";
		$contuser=0; $contperfil=0;$porcentaje=0;$contadordeporcentaje=0;
		foreach ($usuariossinldap as $row) {
			
			$cedula = strtoupper(trim($row['cedula']));

			$user=generauser($row['primer_nombre'],$row['primer_apellido']);

			$val="select nextval('usuarios.user_id_seq')";
			$val=pg_fetch_array(pg_query($postgresql_local,$val));
			pg_query($postgresql_local,"ALTER SEQUENCE usuarios.perfil_id_seq RESTART WITH ".$val['nextval']);

			//INSERTO EN user
   			$query="insert into usuarios.user (id,username, password, is_active) values (".$val['nextval'].",'".strtolower($user)."','".md5($cedula)."',true)";
   			if(pg_query($postgresql_local,$query))$contuser++;

			//INSERTO EN perfil
   			$query="insert into usuarios.perfil (id,user_id, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, cedula, fechanacimiento) values (".$val['nextval'].",".$val['nextval'].",'".$row['primer_nombre']."','".$row['segundo_nombre']."','".$row['primer_apellido']."','".$row['segundo_apellido']."',$cedula,'".$row['fecha_nacimiento']."')";
   			if(pg_query($postgresql_local,$query))$contperfil++;

   			//inserto roll por defecto id 100
   			$query="insert into usuarios.userrol (user_id, rol_id) values (".$val['nextval'].",100)";
   			pg_query($postgresql_local,$query);


		    $porcentajeanterior=$porcentaje;
		    $contadordeporcentaje++;
		    $porcentaje=($contadordeporcentaje*100) / $contarraysinldap;
		    $porcentaje=number_format($porcentaje,0);
			if($porcentaje!=$porcentajeanterior){
				if(strlen($porcentaje)==1)$porcentaje="0".$porcentaje;
				echo $porcentaje.'% | '; 
				if($porcentaje==20 or $porcentaje==40 or $porcentaje==60 or $porcentaje==80)echo "\n";
			}
		}

		echo "\nTOTAL ARRAY: ".$contarraysinldap."\n";
		echo "TOTAL INSERTADOS USER: ".$contuser."\n";
		echo "TOTAL INSERTADOS PERFIL: ".$contperfil."\n";

	} else echo "USUARIOS SIN LDAP INSERTADOS: 0";


	//SUMATORIAS TOTALES


	//CONTAR TRABAJADORES EN SIGEFIRRHH///////////////////////////////////////////// 
	$query="select count(*) as suma from personal p, trabajador t where p.id_personal=t.id_personal and t.estatus='A'";
	$rs = pg_query($postgresql_sigefirrhh,$query);
	$row = pg_fetch_array($rs);
	$sumasgf=$row['suma'];
	////////////////////////////////////////////////////////////////////////////////

	//CONTAR TRABAJADORES EN TELESUR USER///////////////////////////////////////////// 
	$query="select count(*) as suma from usuarios.user";
	$rs = pg_query($postgresql_local,$query);
	$row = pg_fetch_array($rs);
	$sumauser=$row['suma'];
	////////////////////////////////////////////////////////////////////////////////

	//CONTAR TRABAJADORES EN TELESUR PROFILE///////////////////////////////////////////// 
	$query="select count(*) as suma from usuarios.perfil";
	$rs = pg_query($postgresql_local,$query);
	$row = pg_fetch_array($rs);
	$sumaperfil=$row['suma'];
	////////////////////////////////////////////////////////////////////////////////

	echo "\n";
	echo "\nCantidad de trabajadores en Sigefirrhh: ".$sumasgf;
	echo "\nCantidad de trabajadores en Telesur User: ".$sumauser;
	echo "\nCantidad de trabajadores en Telesur Profile: ".$sumaperfil."\n\n";

	echo date("d-m-Y H:i:s");

?>