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
 * esta clase permite cargar extensiones 
 * */
abstract class ExtensionManager
{
	/**
	* @static  string tipo de extendion	
	*/	
	const EXTENSION_TYPE = 'ReportExtension';
	/**
	* carga una extension y retorna una instancia de esta
	*
	*@param string nombre de la extensiones
	*@param string $folder carpeta donde esta alojado la extension
	*@return Extension
	*/
	public static function loadExtension($extensionName, $folder, $type)
	{		
		$className = ucfirst($extensionName).$type;
		
		if($folder) $folder = "$folder/";
		
		if(!class_exists($className))
			require_once ($folder.$extensionName.self::EXTENSION_TYPE.".php");
		
		$extension =  new $className();
		
		return $extension;
	}	 

	/**
	* carga las extensiones encontradas en un directorio
	*
	*@param string carpeta donde estan alojado las extensiones
	*@return array lista de extendiones cargadas
	*/
	public static function autoLoad($folder,$type)
	{		
		$extensions = array();
	 	
		$handle = @opendir($folder);			
	
		while(($new_item = readdir($handle))!==false)
		{
 			$pos = strpos($new_item, self::EXTENSION_TYPE.".php"); 
 			
 			if($pos)
 			{ 				
 				$extensionName = substr($new_item,0,$pos);
				
				$className = ucfirst($extensionName).$type;
		
				if(!class_exists($className))
					include_once ($folder.'/'.$new_item);				
		
				$extension =  new $className(); 				
 				 				
 				array_push($extensions, $className);
 			}
		}
		
		return $extensions;		
	}	 	 
}
?>