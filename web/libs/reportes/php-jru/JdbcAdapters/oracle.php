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
class Oracle implements JdbcAdapterInterface
{
	public function getConexion($host,$port,$database,$user,$password)
	{
		if(!$host) $host = 'localhost';
		
		if(!$port) $port = '1521';
				
		$conn = new JdbcConnection(
			'oracle.jdbc.driver.OracleDriver',
			"jdbc:oracle:thin:$user/$password@$host:$port:$database"
		);
		
		return $conn;
	}
}