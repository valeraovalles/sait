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
 * Esta clase permite definir los metodos de una extension
 * */
interface ReportExtensionInterface 
{
	/**
	 * retorna los parametros del reporte
	 * */
	public function getParam($parametros);
	/**
	 * retorna la sentencia sql para generar el reporte
	 * */
	public function getSqlSentence();	
	/**
	 * retorna codigo html con las opciones especificas para la extension de reporte
	 * */
	public function getHtmlOptions();	
	/**
	 * este metodo se ejecuta antyes de ejcutar el reporte
	 * desde reportManager, si retorna === false NO ejecuta el reporte 
	 * */
	public function beforeRun();	
	/**
	 * este metodo se ejecuta despues de ejcutar el reporte
	 * desde un reportManager, 
	 *
	 * @param recive por parametro el nombre del archivo generado 
	 * */
	public function afterRun($outfilename);
	/**
	 * Este metodo se ejecuta para obtener una conexion jdbc
	 * si no retorna nada reportManager obtendra la conexion
	 * directamente de StandardConexion.
	 * 
	 * Esta pensado para el caso en que una extension
	 * deba tener una conexion propia diferente a las demas
	 * 
	 *  ejemplo de delcaracion
	 *  
	 *  public function getConnexion()
	 *  {
	 *  	return StandarConexion::getConexion('mysql','localhot','3306','database','user','password');
	 *  }  
	 * */
	public function getConexion();	
	
}
?>
