<?php
/**
 * 
 * Indique aqui los parametros de conexion a  la base de datos
 * 
 * */
final class PJRUConexion
{
	const TYPE	= 'pgsql'; //mysql, pgsql, mssql
		
	const HOST	= 'localhost';
	
	const PORT	= '5432';
	
	const DATABASE	= 'sait';
		
	const USER	= 'postgres';
	
	const PASSWORD	= 'postgres';

	/**
	 * permite obtener una conexion jdbc segun el los datos indicados en la url 
	 * pasada por parametro
	 * 
	 * <p>
	 * 		PJRUConexion::get();
	 * 
	 * 		PJRUConexion::get("pgsql://user:pass@host:port/database");
	 * 
	 * 		PJRUConexion::get($type,$host,$port,$user,$pass,$database);
	 * </p>
	 *  
	 * @param mixed
	 * @return jdbcConnection  
	 */
	static function get()
	{
		if(func_num_args() > 1)
		{
			list($type,$host,$port,$database,$user,$pass) = func_get_args();
		}elseif(func_num_args() == 1)		
			$url = parse_url(func_get_arg(0));
			
		if(isset($url) && $url == false)
		{
			throw new Exception('URL mal formada');
		}elseif(isset($url))
		{
			$type		= isset($url['scheme']) && $url['scheme']? $url['scheme']: self::TYPE;
			
			$host		= isset($url['host']) && $url['host']? $url['host']: self::HOST;
			
			$port		= isset($url['port']) && $url['port']? $url['port']: self::PORT;
			
			$user		= isset($url['user']) && $url['user']? $url['user']: self::USER;
			
			$pass		= isset($url['pass']) && $url['pass']? $url['pass']: self::PASSWORD;
			
			$database	= isset($url['path']) && $url['path']? trim($url['path'],'/'): self::DATABASE;			
		}
				
		include_once 'JdbcAdapters/'.$type.'.php';
			
		$className = ucfirst($type); 
			
		$conn =  new $className();
					
		return $conn->getConexion($host,$port,$database,$user,$pass);		
	}
}
