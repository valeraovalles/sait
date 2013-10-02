<?php
        function conectarusuario($usuario, $clave)
        {

			$datos = "";

			$ds = ldap_connect("192.168.3.5") or die ("No se pudo establecer coneccion con el servidor");
			
			ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
			
			$ldapbind = @ldap_bind($ds, "uid=".$usuario.",ou=Personas,dc=telesur" , $clave);
			 

			$conexion=pg_connect("host=192.168.3.139 dbname=sait user=postgres password=..*t3l35ur*..");
			if($ldapbind==1){
		
				  $query="
					select 

						*
					
					from 

						usuarios.user u, usuarios.perfil p 
		
					where 

						u.username='".$usuario."' and u.id=p.user_id

				  ";

				  $rs=pg_query($query);
				  $row=pg_fetch_array($rs);
				  $datos=$row;	
				  
			} else{

				  $pass=md5($clave);

				  $query="
					select 

						*
					
					from 

						usuarios.user u, usuarios.perfil p 
		
					where 

						u.username='".$usuario."' and u.password='".$pass."' and u.id=p.user_id

				  ";

				  $rs=pg_query($query);
				  $row=pg_fetch_array($rs);
				  $datos=$row;	

			}

			return $datos;
        }

		function cuenta_id($id)   
		{

			$datos = "";
			$conexion=pg_connect("host=192.168.3.139 dbname=sait user=postgres password=..*t3l35ur*..");
		
				  $query="
					select 

						p.user_id,p.primer_nombre as nombre1,p.segundo_nombre as nombre2,p.primer_apellido as apellido1,p.segundo_apellido as apellido2,p.cedula,p.extension
					
					from 

						usuarios.perfil p
		
					where 

						p.user_id=".$id."
				  ";

				  $rs=pg_query($query);
				  $row=pg_fetch_array($rs);
				  $datos=$row;	

			$conexion=pg_connect("host=192.168.3.43 dbname=sigefirrhh user=postgres password=postgres");
			$query="
				select d.nombre as descripcion_dependencia, p.sexo from trabajador t, dependencia d, personal p
				where t.id_dependencia=d.id_dependencia and t.id_personal=p.id_personal and t.cedula='".$datos['cedula']."' and t.estatus='A'
			";
			$rs=pg_query($query);
			$row=pg_fetch_array($rs);

				$datos['descripcion_dependencia']=$row['descripcion_dependencia'];
				$datos['sexo']=strtolower($row['sexo']);

			return $datos;
        }

		function cuenta_usuario($usuario)
        {
			$datos = "";

			$conexion=pg_connect("host=192.168.3.139 dbname=sait user=postgres password=..*t3l35ur*..");
		
				  $query="
					select 

						p.user_id,p.primer_nombre as nombre1,p.segundo_nombre as nombre2,p.primer_apellido as apellido1,p.segundo_apellido as apellido2,p.cedula,p.extension,u.username 
					
					from 

						usuarios.perfil p, usuarios.user u
		
					where 

						u.username='".$usuario."' and
						u.id = p.user_id


				  ";


				$rs=pg_query($query);
				$row=pg_fetch_array($rs);
				$datos=$row;	

			$conexion=pg_connect("host=192.168.3.43 dbname=sigefirrhh user=postgres password=postgres");
			$query="
				select d.nombre as descripcion_dependencia, p.sexo from trabajador t, dependencia d, personal p
				where t.id_dependencia=d.id_dependencia and t.id_personal=p.id_personal and t.cedula='".$datos['cedula']."' and t.estatus='A'
			";
			$rs=pg_query($query);
			$row=pg_fetch_array($rs);

				$datos['descripcion_dependencia']=$row['descripcion_dependencia'];
				$datos['sexo']=strtolower($row['sexo']);

			return $datos;
        }

?>
