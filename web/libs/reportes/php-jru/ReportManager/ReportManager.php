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
 * @see ReportExtensionInterface.php 
 * */ 
require('ExtensionManager.php');

/**
 * @see Report	Extension.php
 * */ 
require('ReportExtension.php');  
 /**
 * esta clase permite administrar repotes y cargar extensiones con distintos repotes
 * */
class ReportManager
{
	/**
	 * @var string  carpeta donde se encuentran las extensiones
	 * */
	public $extensionFolder;
	public $abc;
	/**
	 * @var indica donde se genera el reporte
	 */
	public $reportOutDir;
	/**
	* @var array extension lista de extensiones 
	* */
	private $extensions = array();	
	/**
	 * @var string  tipo de extension que carga
	 * */
	private $typeExtension = 'ReportExtension';


	public function prueba(){
		return $this->$abc;
	}

	/**
	* agrega una extension 
	*
	*@param  nombre de la extension
	*/
	public function addExtension($extension)
	{	
		if(!in_array($extension,$this->extensions))
			array_push($this->extensions, $extension);			
	}	
	
	/**
	* retorna true si la extension indiciada esta cargada
	*
	*@param string Nombre de la extension
	*/
	public function inExtension($extensionName)
	{		
		in_array($extensionName, $this->extensions);
		
		return false;
	}
	
	/**
	 * @return array lista de las extensiones disponibles
	 */
	public function getAvailableExtension()
	{
		
		return  ExtensionManager::autoLoad($this->extensionFolder, $this->typeExtension);
	}
	
	/**
	 *@return  instancia de una extension
	 */
	public function getExtensionInstance($extension_name)
	{
		return ExtensionManager::loadExtension($extension_name,$this->extensionFolder,$this->typeExtension);
	}

	/**
	* elimina de la lista de extension 
	*
	*@param string  nombre de la extension
	*/
	public function delExtension($extensionName)
	{
		$i = 0;
		
		foreach ($this->extensions as $extension)
		{
       		if($extension == $extensionName)
       		{
       			$this->extensions[$i] = '';
       			unset($this->extensions[$i]);
       		}	
       		$i++;
		}
	
		$this->extensions = array_values($this->extensions);
	}

	/**
	 * ejecuta un reporte que se haya cargado como una extension
	 * y retorna el contenido del archvio generado
	 * 
	 * @param string $extensionName nombre de la extension que va a generar el reporte
	 * @param string $type tipo de reporte a generar (pdf, odt, html)
	 * @return mixed contenido del reporte 
	 * */
	public function RunToBuffer($extensionName, $type)
	{
		$file = $this->RunToFile($extensionName, $type);
		
		if(file_exists($file))
		{
			$buffer = file_get_contents($file);
		
			unlink($file);
		}	
		
		return $buffer;
	}
		
	/**
	 * ejecuta un reporte que se haya cargado como una extension
	 * 
	 * @param string $extensionName nombre de la extension que va a generar el reporte
	 * @param string $type tipo de reporte a generar (pdf, odt, html)
	 * @return string 
	 * 	nombre de la exension o false si no se genera el reporte
	 * */
	public function RunToFile($extensionName, $type, $nombre,$parametros)
	{
		$extension = null;
		
		if(! $this->extensionFolder)
			$this->extensionFolder = realpath('.').'/';
			
		if(! $this->reportOutDir) 
			$this->reportOutDir = $this->extensionFolder;		
		
		if(!$this->inExtension($extensionName))
		{
			$extension = ExtensionManager::loadExtension(
				$extensionName,
				$this->extensionFolder,
				$this->typeExtension);
			
			if($extension)
				$this->addExtension($extension);
			else
				return false;				
		}		
			



		//instancia el reporte
		$report =  new PJRU();
		
		$conn = $extension->getConexion();
					
 		if(! $conn)
 		{
 			$conn = PJRUConexion::get();
 		}	
			
		$reportName = $nombre.'.'.$type;
		

		$sqlSentence = $extension->getSqlSentence();
					
		$outfilename = $_SERVER['DOCUMENT_ROOT']."/sait/web/reportes/ejecutables/".$reportName;

		if($extension->beforeRun() === false )
			return false;		
		
		$parameters = $extension->getParam($parametros);
		
		if($sqlSentence)
		{
			$methodName = 'run'.ucfirst($type).'FromSql';
			
			$reportFileName = $extension->reportFileName.'.jrxml';						
		}else
		{ 	
			$methodName = 'runReportTo'.ucfirst($type).'File';			
			
			$reportFileName = $extension->reportFileName.'.jasper';
		}
		
		if(get_class($conn) == 'JdbcConnection')
			 $conn = $conn->getConnection();
			
		$result = $report->$methodName(realpath($this->extensionFolder).
			'/'.$reportFileName,$outfilename,$parameters,
			$sqlSentence,$conn);

		$extension->afterRun($outfilename);
		
		if($result)
			return $outfilename;
		else
			return false;	
	}
}
?>