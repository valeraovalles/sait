<?php

		include_once('php-jru.php');
		
		$reportManager = new ReportManager();
		$reportManager->extensionFolder = '../'.$_GET['carpeta'];
		if($_GET['extension']=='pdf'){$formato=PJRU_PDF; $Content='application/pdf';}
		else if($_GET['extension']=='xls'){$formato=PJRU_EXCEL; $Content='application/vnd.ms-excel';}
		else if($_GET['extension']=='odt'){$formato=PJRU_OPEN_DOCUMENT; $Content='application/vnd.oasis.opendocument.text';}
		else if($_GET['extension']=='rtf'){$formato=PJRU_RICH_TEXT; $Content='application/rtf';}
		$result = $reportManager->RunToFile($_GET['nombrereporte'],$formato,$_GET['nombrereporte'],$_GET['parametros']);	
		
		$ruta=$_SERVER['DOCUMENT_ROOT']."/sait/web/libs/reportes/ejecutables/";
		$archivo = $_GET['nombrereporte'].".".$_GET['extension'];

		$ra = $ruta.$archivo;
		header("Content-disposition: attachment; filename=$archivo");
		header("Content-type: application/octet-stream");
		readfile($ra);



		//header("location: /sait/web/libs/reportes/ejecutables/".$_GET['nombrereporte'].".".$_GET['extension']);


?>
