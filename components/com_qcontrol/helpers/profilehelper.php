<?php
/**
 * Helper class for Agenda Component
 * 
 * @package    Joomla.Tutorials
 * @subpackage Modules
 * @link http://docs.joomla.org/J3.x:Creating_a_simple_module/Developing_a_Basic_Module
 * @license        GNU/GPL, see LICENSE.php
 * mod_helloworld is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */

require_once(JPATH_ROOT.'/libraries/ApiLib/include.php');

use QControl\Site\Repository\DriverRepository;
use QControl\Site\Models\SimplifiedDriver;
use QControl\Site\Models\FullDriver;

class ProfileComponentHelper
{

	public static function getDriverById(string $id): FullDriver
	{
		try{
			$driverRepository = new DriverRepository();
			$driver = $driverRepository->getDriverById($id);
			return $driver;
		} catch(Error $error){
			echo "Error caught:  " . $error->getMessage();
		}
	}


}