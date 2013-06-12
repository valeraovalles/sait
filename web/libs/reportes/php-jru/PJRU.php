 <?php
/**
 * PHP Jasper Report Utlis
 * 
 * PHP version 5
 * 
 * LICENSE
 *
 * PHP-JRU is free software; you can redistribute it and/or modify 
 * it under the terms of the GNU General Public License as published 
 * by the Free Software Foundation; either version 2 of the License, 
 * or (at your option) any later version.
 * 
 * PHP-JRU is distributed in the hope that it will be useful, 
 * but WITHOUT ANY WARRANTY; without even the implied warranty 
 * of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  
 * See the GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License 
 * along with PHP-JRU; if not, write to the Free Software Foundation, Inc., 
 * 51 Franklin St, Fifth Floor, Boston, MA 0110-1301, USA
 *
 * @author    Robert Alexander Bruno Monterrey <robert.alexander.bruno@gmail.com>
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt GNU/GPL
 * @version   SVN:$id
 */
 
/**
 * Clase para gestionar reportes de jasper report 
 *
 * @author    Robert Alexander Bruno Monterrey <robert.alexander.bruno@gmail.com>
 */  
class PJRU  {
	/*
	 *Indica una conexion jdbc
	 *@var JdbcConnection  
	 */
	private $jdbcConnection;
	/*
	 *establece la conexion jdbc
	 * 
	 *@param JdbcConnection $jdbcConnection conexion jdbc 
	 */
	public function setJdbcConnection($jdbcConnection)
	{
		$this->jdbcConnection = $jdbcConnection;
	}
	
	/*
	 * retorna la conexion jdbc
	 * 
	 * @return JdbcConnection $jdbcConnection conexion jdbc 
	 */
	public function getJdbcConnection()
	{
		return $this->jdbcConnection;
	} 	
	/*
	 * Genera un reporte  pdf  
	 * 
	 * @param string $inputFileName url del archivo .jasper
	 * @param string $outputFileName url del archivo pdf que se generara 
	 * @param java.util.HashMap $parameters parametros del reporte 
	 * @param JdbcConnection $conn conexcion jdbc
	 */
	public function runReportToPdfFile($inputFileName,$outputFileName, $parameters, $conn)
	{
		if(!isset($conn))
			$conn = $this->getJdbcConnection();
			
		if(!$outputFileName){
			$outputFileName =  dirname($inputFileName).'/'.pathinfo(
				$inputFileName,PATHINFO_FILENAME).'.pdf';
		}
		
		try {           
			$JasperRunManager =  new Java (
				'net.sf.jasperreports.engine.JasperRunManager');			
				
			if(!isset($conn))
				$JasperRunManager->runReportToPdfFile($inputFileName,$outputFileName,
					$parameters);
			else			
				$JasperRunManager->runReportToPdfFile($inputFileName,$outputFileName,
					$parameters, $conn);
				
			return true;
			
		} catch (JavaException $ex) {
  			$trace = new Java('java.io.ByteArrayOutputStream');
			$ex->printStackTrace(new Java('java.io.PrintStream', $trace));
			print nl2br("java stack trace: $trace\n");
			return false;
		}
	}

	/*
	 * Genera reporte pdf usando sentencia sql 
	 * 
	 * @param string $inputFileName url del archivo .jrxml
	 * @param string $outputFileName url del archivo pdf que se generara 
	 * @param java.util.HashMap $parameters parametros del reporte 
	 * @param JdbcConnection $conn conexcion jdbc
	 */
	public function runPdfFromSql($inputFileName, $outputFileName, $parameters, $query,$conn)
	{		
		if(!isset($conn))
			$conn = $this->jdbcConnection;
		
		$JasperDesign = new Java ('net.sf.jasperreports.engine.design.JasperDesign');
		$JRDesignQuery = new Java ('net.sf.jasperreports.engine.design.JRDesignQuery');
		
		$JRXmlLoader =  new Java ('net.sf.jasperreports.engine.xml.JRXmlLoader');
		$JasperDesign = $JRXmlLoader->load($inputFileName); 
		
		$JRDesignQuery->setText($query);
		$JasperDesign->setQuery($JRDesignQuery);
		
		if(!$outputFileName){
			$outputFileName =  dirname($inputFileName).'/'.pathinfo(
				$inputFileName,PATHINFO_FILENAME).'.pdf';
		}		
		
		$jasper_file_name =  dirname($outputFileName).'/'.pathinfo(
			$outputFileName,PATHINFO_FILENAME).'.jasper';
			
		$JasperCompileManager =  new Java (
			'net.sf.jasperreports.engine.JasperCompileManager');
						
		$JasperCompileManager->compileReportToFile(
			$JasperDesign,$jasper_file_name);
		
		try {           
			$JasperRunManager =  new Java (
				'net.sf.jasperreports.engine.JasperRunManager');
					
			$JasperRunManager->runReportToPdfFile($jasper_file_name,$outputFileName,
				$parameters,$conn);
				
			unlink($jasper_file_name);
				
			return true;
			
		} catch (JavaException $ex) {
  			$trace = new Java('java.io.ByteArrayOutputStream');
			$ex->printStackTrace(new Java('java.io.PrintStream', $trace));
			print nl2br("java stack trace: $trace\n");
			return false;
		}		
	}
	
	 /*
	 * Genera un reporte html 
	 * 
	 * @param string $inputFileName url del archivo .jasper
	 * @param string $outputFileName url del archivo html que se generara 
	 * @param java.util.HashMap $parameters parametros del reporte 
	 * @param JdbcConnection $conn conexcion jdbc
	 */
	public function runReportToHtmlFile($inputFileName,$outputFileName, $parameters, $conn)
	{
		if(!isset($conn))
			$conn = $this->getJdbcConnection();

		if(!$outputFileName)
		{
			$outputFileName =  dirname($inputFileName).'/'.pathinfo(
				$inputFileName,PATHINFO_FILENAME).'.html';
		}
		
		try {           
						 
			$JasperRunManager =  new Java (
				'net.sf.jasperreports.engine.JasperRunManager');
			
			if(!$conn)	
				$JasperRunManager->runReportToHtmlFile($inputFileName,$outputFileName,
					$parameters);
			else
				$JasperRunManager->runReportToHtmlFile($inputFileName,$outputFileName,
					$parameters, $conn);
				
			return true;
			
		} catch (JavaException $ex) {
  			$trace = new Java('java.io.ByteArrayOutputStream');
			$ex->printStackTrace(new Java('java.io.PrintStream', $trace));
			print nl2br("java stack trace: $trace\n");
			return false;
		}
	}

	/*
	 * Genera un reporte html usando sentencia sql 
	 * 
	 * @param string $inputFileName url del archivo .jrxml
	 * @param string $outputFileName url del archivo html que se generara 
	 * @param java.util.HashMap $parameters parametros del reporte 
	 * @param JdbcConnection $conn conexcion jdbc
	 */
	public function runHtmlFromSql($inputFileName, $outputFileName, $parameters, $query,$conn)
	{			
		if(!isset($conn))
			$conn = $this->jdbcConnection;
		
		try {           
			$JasperDesign = new Java (
				'net.sf.jasperreports.engine.design.JasperDesign');
				
			$JRDesignQuery = new Java (
				'net.sf.jasperreports.engine.design.JRDesignQuery');
		
			$JRXmlLoader =  new Java (
				'net.sf.jasperreports.engine.xml.JRXmlLoader');
				
			$JasperDesign = $JRXmlLoader->load($inputFileName); 
		
			$JRDesignQuery->setText($query);
			
			$JasperDesign->setQuery($JRDesignQuery);
		
			if(!$outputFileName){
				$outputFileName =  dirname($inputFileName).'/'.pathinfo(
					$inputFileName,PATHINFO_FILENAME).'.html';
			}		
		
			$jasper_file_name =  dirname($outputFileName).'/'.pathinfo(
				$outputFileName,PATHINFO_FILENAME).'.jasper';
			
			$JasperCompileManager =  new Java ('net.sf.jasperreports.engine.JasperCompileManager');
						
			$JasperCompileManager->compileReportToFile($JasperDesign,$jasper_file_name);
				
			$JasperFillManager = new Java('net.sf.jasperreports.engine.JasperFillManager');
			
			$fillReport = $JasperFillManager->fillReport($jasper_file_name,$parameters,$conn);

			$exporterHTML = new Java (
				'net.sf.jasperreports.engine.export.JRXhtmlExporter');
			
			$JRExporterParameter  =  new Java (
				'net.sf.jasperreports.engine.export.JRHtmlExporterParameter');
				
			$exporterHTML->setParameter($JRExporterParameter->JASPER_PRINT,$fillReport);
				 
       		$exporterHTML->setParameter($JRExporterParameter->OUTPUT_FILE_NAME,$outputFileName);
       		
       		$Boolean = new Java('java.lang.Boolean');
       				
       		$exporterHTML->setParameter($JRExporterParameter->IS_OUTPUT_IMAGES_TO_DIR,$Boolean->FALSE);
       		       					
			$exporterHTML->exportReport();
			
			unlink($jasper_file_name);
			
			$dir_name = "{$outputFileName}_files";
			
			if(file_exists($dir_name))
				if(chmod($dir_name, 0777))
				{
					array_map( "unlink", glob($dir_name.'/*' ) );

					rmdir($dir_name);				
				}
			
			return true;			
			
		} catch (JavaException $ex) {
  			$trace = new Java('java.io.ByteArrayOutputStream');
			$ex->printStackTrace(new Java('java.io.PrintStream', $trace));
			print nl2br("java stack trace: $trace\n");
			return false;
		}
	}
	/*
	 * Genera un reporte en Rich Text Format 
	 * 
	 * @param string $inputFileName url del archivo .jasper
	 * @param string $outputFileName url del archivo Rtf que se generara 
	 * @param java.util.HashMap $parameters parametros del reporte 
	 * @param JdbcConnection $conn conexcion jdbc
	 */
	public function runReportToRtfFile($inputFileName,$outputFileName, $parameters, $conn)
	{
		if(!isset($conn))
			$conn = $this->getJdbcConnection();

		if(!$outputFileName){
			$outputFileName =  dirname($inputFileName).'/'.pathinfo(
				$inputFileName,PATHINFO_FILENAME).'.rtf';
		}	
		
		try {		      
			
			$JasperFillManager = new Java('net.sf.jasperreports.engine.JasperFillManager');
			
			$fillReport = $JasperFillManager->fillReport($inputFileName,$parameters,$conn);			
			 
    		$exporterRTF = new Java ('net.sf.jasperreports.engine.export.JRRtfExporter');
			
			$JRExporterParameter  =  new Java ('net.sf.jasperreports.engine.JRExporterParameter');
				
			$exporterRTF->setParameter($JRExporterParameter->JASPER_PRINT, $fillReport);
				 
       		$exporterRTF->setParameter($JRExporterParameter->OUTPUT_FILE_NAME, $outputFileName);
				       					
			$exporterRTF->exportReport();
		
			return true;
			
		} catch (JavaException $ex) {
  			$trace = new Java('java.io.ByteArrayOutputStream');
			$ex->printStackTrace(new Java('java.io.PrintStream', $trace));
			print nl2br("java stack trace: $trace\n");
			return false;
		}
	}
/*
	 * Genera un reporte  Rich Text Format 
	 * 
	 * @param string $inputFileName url del archivo .jasper
	 * @param string $outputFileName url del archivo odt que se generara 
	 * @param java.util.HashMap $parameters parametros del reporte 
	 * @param JdbcConnection $conn conexcion jdbc
	 */
	public function runRtfFromSql($inputFileName, $outputFileName, $parameters, $query,$conn)
	{		
		if(!isset($conn))
			$conn = $this->jdbcConnection;
		
		try {           
			$JasperDesign = new Java (
				'net.sf.jasperreports.engine.design.JasperDesign');
				
			$JRDesignQuery = new Java (
				'net.sf.jasperreports.engine.design.JRDesignQuery');
		
			$JRXmlLoader =  new Java (
				'net.sf.jasperreports.engine.xml.JRXmlLoader');
				
			$JasperDesign = $JRXmlLoader->load($inputFileName); 
		
			$JRDesignQuery->setText($query);
			
			$JasperDesign->setQuery($JRDesignQuery);
		
			if(!$outputFileName){
				$outputFileName =  dirname($inputFileName).'/'.pathinfo(
					$inputFileName,PATHINFO_FILENAME).'.rtf';
			}		
		
			$jasper_file_name =  dirname($outputFileName).'/'.pathinfo(
				$outputFileName,PATHINFO_FILENAME).'.jasper';
			
			$JasperCompileManager =  new Java ('net.sf.jasperreports.engine.JasperCompileManager');
						
			$JasperCompileManager->compileReportToFile($JasperDesign,$jasper_file_name);
				
			$JasperFillManager = new Java('net.sf.jasperreports.engine.JasperFillManager');
			
			$fillReport = $JasperFillManager->fillReport($jasper_file_name,$parameters,$conn);				
			
			$exporterRTF = new Java (
				'net.sf.jasperreports.engine.export.JRRtfExporter');
			
			$JRExporterParameter  =  new Java (
				'net.sf.jasperreports.engine.JRExporterParameter');
				
			$exporterRTF->setParameter($JRExporterParameter->JASPER_PRINT,$fillReport);
				 
       		$exporterRTF->setParameter($JRExporterParameter->OUTPUT_FILE_NAME,
       				$outputFileName);
				       					
			$exporterRTF->exportReport();
				
			unlink($jasper_file_name);
			
			return true;			
			
		} catch (JavaException $ex) {
  			$trace = new Java('java.io.ByteArrayOutputStream');
			$ex->printStackTrace(new Java('java.io.PrintStream', $trace));
			print nl2br("java stack trace: $trace\n");
			return false;
		}		
	}
	/*
	 * Genera un reporte exel 
	 * 
	 * @param string $inputFileName url del archivo .jasper
	 * @param string $outputFileName url del archivo xls que se generara 
	 * @param java.util.HashMap $parameters parametros del reporte 
	 * @param JdbcConnection $conn conexcion jdbc
	 */
	public function runReportToXlsFile($inputFileName,$outputFileName, $parameters, $conn)
	{
		if(!isset($conn))
			$conn = $this->getJdbcConnection();

		if(!$outputFileName){
			$outputFileName =  dirname($inputFileName).'/'.pathinfo(
				$inputFileName,PATHINFO_FILENAME).'.xls';
		}	
		
		try {		      
			
			$JasperFillManager = new Java('net.sf.jasperreports.engine.JasperFillManager');
			
			$fillReport = $JasperFillManager->fillReport($inputFileName,$parameters,$conn);			
			 
    		$exporterXLS = new Java ('net.sf.jasperreports.engine.export.JRXlsExporter');
			
			$JRExporterParameter  =  new Java ('net.sf.jasperreports.engine.JRExporterParameter');
				
			$exporterXLS->setParameter($JRExporterParameter->JASPER_PRINT, $fillReport);
				 
       		$exporterXLS->setParameter($JRExporterParameter->OUTPUT_FILE_NAME, $outputFileName);
				       					
			$exporterXLS->exportReport();
		
			return true;
			
		} catch (JavaException $ex) {
  			$trace = new Java('java.io.ByteArrayOutputStream');
			$ex->printStackTrace(new Java('java.io.PrintStream', $trace));
			print nl2br("java stack trace: $trace\n");
			return false;
		}
	}
	
	/*
	 * Genera un reporte exel	   
	 * 
	 * @param string $inputFileName url del archivo .jasper
	 * @param string $outputFileName url del archivo odt que se generara 
	 * @param java.util.HashMap $parameters parametros del reporte 
	 * @param JdbcConnection $conn conexcion jdbc
	 */
	public function runXlsFromSql($inputFileName, $outputFileName, $parameters, $query,$conn)
	{		
		if(!isset($conn))
			$conn = $this->jdbcConnection;
		
		try {           
			$JasperDesign = new Java (
				'net.sf.jasperreports.engine.design.JasperDesign');
				
			$JRDesignQuery = new Java (
				'net.sf.jasperreports.engine.design.JRDesignQuery');
		
			$JRXmlLoader =  new Java (
				'net.sf.jasperreports.engine.xml.JRXmlLoader');
				
			$JasperDesign = $JRXmlLoader->load($inputFileName); 
		
			$JRDesignQuery->setText($query);
			
			$JasperDesign->setQuery($JRDesignQuery);
		
			if(!$outputFileName){
				$outputFileName =  dirname($inputFileName).'/'.pathinfo(
					$inputFileName,PATHINFO_FILENAME).'.xls';
			}		
		
			$jasper_file_name =  dirname($outputFileName).'/'.pathinfo(
				$outputFileName,PATHINFO_FILENAME).'.jasper';
			
			$JasperCompileManager =  new Java ('net.sf.jasperreports.engine.JasperCompileManager');
						
			$JasperCompileManager->compileReportToFile($JasperDesign,$jasper_file_name);
				
			$JasperFillManager = new Java('net.sf.jasperreports.engine.JasperFillManager');
			
			$fillReport = $JasperFillManager->fillReport($jasper_file_name,$parameters,$conn);				
			
			$exporterXLS = new Java (
				'net.sf.jasperreports.engine.export.JRXlsExporter');
			
			$JRExporterParameter  =  new Java (
				'net.sf.jasperreports.engine.JRExporterParameter');
				
			$exporterXLS->setParameter($JRExporterParameter->JASPER_PRINT,$fillReport);
				 
       		$exporterXLS->setParameter($JRExporterParameter->OUTPUT_FILE_NAME,
       				$outputFileName);
				       					
			$exporterXLS->exportReport();
				
			unlink($jasper_file_name);
			
			return true;			
			
		} catch (JavaException $ex) {
  			$trace = new Java('java.io.ByteArrayOutputStream');
			$ex->printStackTrace(new Java('java.io.PrintStream', $trace));
			print nl2br("java stack trace: $trace\n");
			return false;
		}		
	}
	
	/*
	 * Genera un reporte odt usando sentencia sql
	 * 
	 * @param string $inputFileName url del archivo .jrxml
	 * @param string $outputFileName url del archivo odt que se generara 
	 * @param java.util.HashMap $parameters parametros del reporte 
	 * @param JdbcConnection $conn conexcion jdbc
	 */
	public function runOdtFromSql($inputFileName, $outputFileName, $parameters, $query,$conn)
	{		
		if(!isset($conn))
			$conn = $this->jdbcConnection;		
		
		try {           
		
			$JasperDesign = new Java (
				'net.sf.jasperreports.engine.design.JasperDesign');
						
			$JRDesignQuery = new Java (
				'net.sf.jasperreports.engine.design.JRDesignQuery');
				
			$JRXmlLoader =  new Java (
				'net.sf.jasperreports.engine.xml.JRXmlLoader');
		
			$JasperDesign = $JRXmlLoader->load($inputFileName); 
		
			$JRDesignQuery->setText($query);
		
			$JasperDesign->setQuery($JRDesignQuery);

			if(!$outputFileName){
				$outputFileName =  dirname($inputFileName).'/'.pathinfo(
					$inputFileName,PATHINFO_FILENAME).'.odt';
			}	
		
			$jasper_file_name =  dirname($outputFileName).'/'.pathinfo(
				$outputFileName,PATHINFO_FILENAME).'.jasper';
			
			$JasperCompileManager =  new Java (
				'net.sf.jasperreports.engine.JasperCompileManager');
						
			$JasperCompileManager->compileReportToFile(
				$JasperDesign,$jasper_file_name);
	
			if($this->runReportToOdtFile($jasper_file_name,$outputFileName, 
				$parameters, $conn))
			{
				unlink($jasper_file_name);

				return true;
			}else
				return false;
				
		} catch (JavaException $ex) {
  			$trace = new Java('java.io.ByteArrayOutputStream');
			$ex->printStackTrace(new Java('java.io.PrintStream', $trace));
			print nl2br("java stack trace: $trace\n");
			return false;
		}		
	}  

	 /*
	 * Genera un reporte Odt( Open Document Text)	   
	 * 
	 * @param string $inputFileName url del archivo .jasper
	 * @param string $outputFileName url del archivo odt que se generara 
	 * @param java.util.HashMap $parameters parametros del reporte 
	 * @param JdbcConnection $conn conexcion jdbc
	 */
	public function runReportToOdtFile($inputFileName,$outputFileName, $parameters, $conn)
	{
		if(!isset($conn))
			$conn = $this->getJdbcConnection();

		if(!$outputFileName){
			$outputFileName =  dirname($inputFileName).'/'.pathinfo(
				$inputFileName,PATHINFO_FILENAME).'.odt';
		}	
		
		try {		      
			
			$JasperFillManager = new Java('net.sf.jasperreports.engine.JasperFillManager');
			
			$fillReport = $JasperFillManager->fillReport($inputFileName,
				$parameters,$conn);			
			 
    		$JROdtExporter = new Java (
				'net.sf.jasperreports.engine.export.oasis.JROdtExporter');
			
			$JRExporterParameter  =  new Java (
				'net.sf.jasperreports.engine.JRExporterParameter');
				
			$JROdtExporter->setParameter($JRExporterParameter->JASPER_PRINT,
				 $fillReport);
				 
       		$JROdtExporter->setParameter($JRExporterParameter->OUTPUT_FILE_NAME,
       				$outputFileName);
				       					
			$JROdtExporter->exportReport();
		
			return true;
			
		} catch (JavaException $ex) {
  			$trace = new Java('java.io.ByteArrayOutputStream');
			$ex->printStackTrace(new Java('java.io.PrintStream', $trace));
			print nl2br("java stack trace: $trace\n");
			return false;
		}
	}	
}
?>
