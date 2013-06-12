<?php
class MunicipiosReportExtension extends ReportExtension   
{	
	public $alias = 'Listado de municipios';
	
	public $reportFileName = 'municipios'; //como no retorna sentencia sql Reportmanager busca municipios.jasper

	public $enabled = true;

	public function getParam()
	{		
		$parameters = new java ('java.util.HashMap');   	    
   	    
		$parameters->put('TITLE', 'LISTADO DE MUNICIPIOS DE VENEZUELA');
		
   	    $parameters->put('HEADER_REPORT', 'INSTITUTO DE ESTUDIOS GEOPOLITICOS');
 		
		$parameters->put('REPORT_LOCALE', new Java('java.util.Locale','es', 'VE'));
						 		
		return $parameters;
	}

	public function getSqlSentence(){}
	
	public function getHtmlOptions(){}
	
	public function beforeRun(){}
	
	public function afterRun($outfilename){}
	
	public function getConexion()
	{		
		return PJRUConexion::get('excel://municipios.xls');
	}
}
?>