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
class Excel implements JdbcAdapterInterface
{
	public function getConexion($host,$port,$database,$user,$password)
	{
		$exist = file_exists($host);		
		
		if ($exist)
		{	
			$file =  new java('java.io.File',realpath($host));
			
			$RXlsDataSource = new java(
				'net.sf.jasperreports.engine.data.JRXlsDataSource',$file);
			
			return $RXlsDataSource;
		}else{   			
			return false;   			
		}
	}
}