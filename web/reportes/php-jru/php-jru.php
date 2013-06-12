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
 * Define la constante que indica donde se encuentra Java.inc
 * */
define('JAVA_INC_URL','http://localhost:8080/PHPJRU/java/Java.inc');
/**
 * define la version de PHP-JRU
 * */
define('PHP_JRU_VERSION','1.0');

if( ! function_exists('java')){
	if( ini_get("allow_url_include"))
		require_once(JAVA_INC_URL);
	else
		die ('necesita habilitar allow_url_include en php.ini para poder usar php-jru.');
}

define('PJRU_PDF','pdf');

define('PJRU_OPEN_DOCUMENT','odt');

define('PJRU_EXCEL','xls');

define('PJRU_HTML','html');

define('PJRU_RICH_TEXT','rtf');

/**
 * @see JdbcConnection
 */
require_once 'JdbcConnection.php';
/**
 * @see PJRU.php 
 * */ 
require_once('PJRU.php');
/**
 * @see JdbcAdapterInterface
 */
require_once 'JdbcAdapters/JdbcAdapterInterface.php';
/**
 * @see StandardConexion.php
 */
require_once 'PJRUConexion.php';
/**
 * @see ReportManager.php 
 * */ 
require_once('ReportManager/ReportManager.php');
