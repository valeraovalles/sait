<?php
$archivo=$_GET['archivo'];
$ruta=$_GET['ruta'];

header("Content-disposition: attachment; filename=".$archivo);
header("Content-type: application/octet-stream");
readfile($ruta.$archivo);  
?>
