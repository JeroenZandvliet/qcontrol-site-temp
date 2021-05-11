<?php
/**
 * Helper class for Driver Component
 * 
 * @package    Joomla.Tutorials
 * @subpackage Modules
 * @link http://docs.joomla.org/J3.x:Creating_a_simple_module/Developing_a_Basic_Module
 * @license        GNU/GPL, see LICENSE.php
 * mod_qcontrol is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */

require_once(JPATH_ROOT.'/libraries/qcontrol/include.php');

use QControl\Site\Repository\DriverRepository;
use QControl\Site\Models\SimplifiedDriver;

class DriverComponentHelper
{
	public static function getAllDrivers()
	{
		try{
			$driverRepository = new DriverRepository();
			$drivers = $driverRepository->getAllDrivers();
			return $drivers;
			} catch(Error $error){
				echo "Error: " . $error->getMessage();
			}
	}

	public static function renderDriverHTML(Event $event)
	{

	}
}