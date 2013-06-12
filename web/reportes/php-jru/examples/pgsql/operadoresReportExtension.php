<?php
class OperadoresReportExtension extends ReportExtension   
{	
	public $alias = 'dd';
	
	public $reportFileName = 'operadores';

	public $enabled = true;

	public function getParam()
	{
		//parametros del reporte
				
		$parameters = new java ('java.util.HashMap');
		
		$parameters->put('ruta', 'sssss');
   	       	    	$parameters->put('titulo', 'dddddddd');
		$parameters->put('REPORT_LOCALE', new Java('java.util.Locale','es', 'VE'));
 		
		return $parameters;

	}

	public function getSqlSentence()
	{
		//sentencia sql del reporte, si la modifica altera el resultado del reporte
	return 'select * from "distribucion".operador o, "distribucion".pais p, "distribucion".tipooperador top, "distribucion".comodato c, "distribucion".representante r
where o.pais_id=p.id and o.tipooperador_id=top.id and o.comodato_id=c.id and o.id=r.operador_id';
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
			'telesur', 			//base de datos
			'postgres',				//usuario
			'postgres'				//password
		);
	}
}
?>
