<?php
        require_once('../nusoap/lib/nusoap.php');
        require_once('cuenta.php');
 
        $server = new nusoap_server();
        $server->register('conectarusuario');
        $server->register('cuenta_id');
        $server->register('cuenta_usuario');
	 
        $HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
        $server->service($HTTP_RAW_POST_DATA);
?>
