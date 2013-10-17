<?php
        require_once('../nusoap/lib/nusoap.php');
        //$cliente = new nusoap_client('http://192.168.3.60/webservices/cuenta/servicio.php');
        $cliente = new nusoap_client('http://localhost/sait/web/libs/webservices/cuenta/servicio.php');

        //$resultado = $cliente->call('conectarusuario', array('usuario' => 'jvalera','clave' => '17312612'));
        $resultado = $cliente->call('cuenta_id', array('id' => '851'));
        print_r($resultado);


?>
