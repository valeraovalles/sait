<?php

namespace Administracion\UsuarioBundle\Resources\Misclases;
use Administracion\UsuarioBundle\Resources\Misclases\Conexion;

class Funcion
{
    public function datosUsuarioInfocent($cedula)
    {
        $a=new Conexion();
        $db=$a->oracle();
        $query="select * from nmm001 where cedula like '%".$cedula."%' and fecret is null";
        $rs = oci_parse($db,$query);
        oci_execute($rs);
        $row = oci_fetch_array($rs, OCI_ASSOC); 
                     
        $datos['sueldo']=$row['SUELD1']*30;
          
        return $datos;
    }

     public function datosUsuarioSigefirrhh($cedula)
    {
        $a=new Conexion();
        $db=$a->postgresql_sigefirrhh();
        $query="SELECT p.cedula, p.primer_nombre, p.primer_apellido, t.sueldo_basico FROM personal p, trabajador t where t.estatus='A' and p.cedula=t.cedula and t.cedula='".$cedula."'";
        $rs = pg_query($db, $query);
        $row = pg_fetch_array($rs);
         
        $datos['sueldo']=$row['sueldo_basico'];
          
        return $datos;
    }
        
    function buscaUID($cedula)
    {
        $ds = ldap_connect("192.168.3.5") or die ("No se pudo establecer coneccion con el servidor");
        ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
        $sr=ldap_search($ds,"ou=Personas, dc=telesur", "telephonenumber=".$cedula);	
        $info = ldap_get_entries($ds, $sr);

        if (isset($info[0]['uid'][0]))
        return strtolower(trim($info[0]['uid'][0]));
        else return null;
    }
    
}