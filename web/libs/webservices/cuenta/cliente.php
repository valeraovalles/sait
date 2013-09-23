<?php
        require_once('../nusoap/lib/nusoap.php');
        //$cliente = new nusoap_client('http://192.168.3.60/webservices/cuenta/servicio.php');
        $cliente = new nusoap_client('http://localhost/webservices/cuenta/servicio.php');

        $resultado = $cliente->call('conectarusuario', array('usuario' => 'jvalera','clave' => '#v4l3r4*..'));
        print_r($resultado);
?>
