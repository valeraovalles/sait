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

?>
