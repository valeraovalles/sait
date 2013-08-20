<?php

namespace Administracion\UsuarioBundle\Resources\Misclases;

class Conexion
{
    
    public function oracle()
    {

		$DB_OCI = '(DESCRIPTION =
		(ADDRESS =
		(PROTOCOL = TCP)
		(HOST = 192.168.3.12)
		(PORT = 1521)
		)
		(CONNECT_DATA =
		(SERVER = DEDICATED)
		(SERVICE_NAME = SPI)
		)
		)';

		$USER_OCI = "infocent";
		$PASS_OCI = "inf0c3nt2012";
		$db = oci_connect($USER_OCI, $PASS_OCI, $DB_OCI);
		return $db;

	}
        
        public function mysql_60(){
            
            	$conexion=mysql_connect("192.168.3.60","jvalera","jhoangvo123");	
                mysql_select_db("visitantes",$conexion);
                mysql_query("SET NAMES 'utf8'");
                
                
        }
        
        public function postgresql_local(){
            
                return pg_connect("host=localhost dbname=sait user=postgres password=..*t3l35ur*..");
                
        }
        
        public function postgresql_sigefirrhh(){
            
                $conexion=pg_connect("host=192.168.3.43 dbname=sigefirrhh user=postgres password=postgres");
                pg_query("SET NAMES 'utf8'");
                
                return $conexion;
                
        }


        public function postgresql_jhoan(){
            
                return pg_connect("host=localhost dbname=sait user=postgres password=postgres");
                
        }
        
}