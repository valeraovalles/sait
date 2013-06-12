<?php
class ProductosReportExtension extends ReportExtension   
{	
	public $alias = 'Listado de productos';
	
	public $reportFileName = 'productos';

	public $enabled = true;

	public function getParam()
	{
		//parametros del reporte
				
		$parameters = new java ('java.util.HashMap');
		
		$parameters->put('URL_IMG', realpath('header.jpg'));
   	    
   	    $parameters->put('HEADER_REPORT', 'Inversiones 2021, C.A. <br/> Listado de Productos');
 		
		$parameters->put('REPORT_LOCALE', new Java('java.util.Locale','es', 'VE'));

		return $parameters;
	}

	public function getSqlSentence()
	{
		//sentencia sql del reporte, si la modifica altera el resultado del reporte
		return 'select
				pro.id,tpp.nombre as "tipoproducto",
				pro.modelo,
				pro.costo
				from productos pro
				left outer join tipoproducto tpp on tpp.id=pro.tipoproducto_id';
	}
	
	public function getHtmlOptions(){}
	
	public function beforeRun(){}
	
	public function afterRun($outfilename){}
	
	public function getConexion()
	{
		/*
		 * si no indica los datos de la conexión el 
		 * reporte saldrá en blanco
		 * */
				
		return PJRUConexion::get(
			'pgsql',		//tipo de conexion
			'localhost',	//host
			'5432',				// puerto (en blaco toma el puerto por defecto)
			'productos', 			//base de datos
			'postgres',				//usuario
			'postgres'				//password
		);
	}
}
?>
