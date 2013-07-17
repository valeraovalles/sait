<?php
class OperadoresReportExtension extends ReportExtension   
{	
	public $alias = 'operadores';
	
	public $reportFileName = 'operadores';

	public $enabled = true;

	public function getParam($parametros)
	{
		$parametros = stripslashes($parametros); 
	    $parametros = urldecode($parametros); 
	    $parametros = unserialize($parametros);

		//parametros del reporte
				
		$parameters = new java ('java.util.HashMap');
		
		$parameters->put('ruta', 'sssss');
   	    $parameters->put('titulo', 'OPERADORES');
   	    $parameters->put('idoperadordesde', $parametros['idoperadordesde']);
   	    $parameters->put('idoperadorhasta', $parametros['idoperadorhasta']);
		$parameters->put('REPORT_LOCALE', new Java('java.util.Locale','es', 'VE'));
 		
		return $parameters;

	}

	public function getSqlSentence()
	{
		//sentencia sql del reporte, si la modifica altera el resultado del reporte
	return 'select * from "distribucion".operador o, "distribucion".pais p, "distribucion".tipooperador top, "distribucion".comodato c, "distribucion".representante r
where o.pais_id=p.id and o.tipooperador_id=top.id and o.comodato_id=c.id and o.id=r.operador_id and o.id
BETWEEN $P{idoperadordesde} AND $P{idoperadorhasta}';
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
			'sait', 			//base de datos
			'postgres',				//usuario
			'postgres'				//password
		);
	}
}
?>