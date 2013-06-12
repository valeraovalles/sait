<?php
	include_once('../../php-jru.php');
	
	$reportManager =  new ReportManager();	
		
	$result = $reportManager->RunToBuffer('municipios',PJRU_PDF);	

	header('Content-type: application/pdf');
	
	print $result;	
?>
