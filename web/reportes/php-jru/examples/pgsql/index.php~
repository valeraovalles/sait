<?php
	/*se incluse las librerias*/
	include_once('../../php-jru.php');

	/*lista de formatos y su respectivo mime type*/
	$formatos = array(
		PJRU_PDF => 
			array('Documento Portable (PDF)','application/pdf'),
		PJRU_EXCEL => 
			array('Exel','application/vnd.ms-excel'),
		PJRU_OPEN_DOCUMENT => 
			array('OpenOffice','application/vnd.oasis.opendocument.text'),
		PJRU_RICH_TEXT => 
			array('Documento de Texto de Microsoft (RTF)','application/rtf')
	);
	
	/*se genera el report si se indica el formato*/
	if(isset($_REQUEST['formato']))
	{
		$reportManager =  new ReportManager();
			
		$result = $reportManager->RunToFile('productos',$_REQUEST['formato']);	

		header('Content-type: '.$formatos[$_REQUEST['formato']][1]);
	
		print $result;

		die(0);
	}else
	{
?>

<div style="margin-left: auto; margin-right: auto; width: 450px;  margin-top: 100px">

<h2>Generación de reportes con PHP-JRU </h2>
Para mayor información visite:
<br/> 
<a href="http://robertbruno.wordpress.com">robertbruno.wordpress.com</a>

<br/><br/>

Indique el formato del reporte que desea ejecutar

<br/>

<form action="<?php echo  $_SERVER['PHP_SELF']?>">

<select name="formato">
	
<?php foreach ($formatos as $ext => $descripcion):?>

<option value='<?php echo $ext?>'><?php echo $descripcion[0]?></option>

<?php endforeach;?>
	
</select>

<input type="submit"/> 

</form>

</div>	
<?php }?>
