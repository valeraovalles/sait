<?php
class ProductosReportExtension extends ReportExtension   
{	
	public $alias = 'Listado de productos';
	
	public $reportFileName = 'productos'; //como no retorna sentencia sql Reportmanager busca productos.jasper

	public $enabled = true;

	public function getParam()
	{		
		$parameters = new java ('java.util.HashMap');   	    
   	    
   	    $parameters->put('HEADER_REPORT', 'Inversiones 2021, C.A. <br/> Listado de Productos');
 		
		$parameters->put('REPORT_LOCALE', new Java('java.util.Locale','es', 'VE'));
						 		
		return $parameters;
	}

	public function getSqlSentence(){}
	
	public function getHtmlOptions(){}
	
	public function beforeRun(){}
	
	public function afterRun($outfilename){}
	
	public function getConexion()
	{
		return PJRUConexion::get('xml://productos.xml');
	}
}
?>