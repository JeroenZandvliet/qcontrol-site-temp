<?php
/**
 * Helper class for Vehicle Component
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

// no direct access
defined('_JEXEC') or die('Restricted access');

use QControl\Site\Repository\VehicleRepository;
use QControl\Site\Models\Vehicle;

class VehiclesComponentHelper
{
	public static function retrieveAllVehicles()
	{
		try{
			$vehicleRepository = new VehicleRepository();
			$vehicles = $vehicleRepository->getAllVehicles();
			return $vehicles;
			
			} catch(Error $error){
				echo "Error: " . $error->getMessage();
			}
	}

	public static function getVehicleByVehicleId($id)
	{
		try{
			$vehicleRepository = new VehicleRepository();
			$vehicles = $vehicleRepository->getVehicleByVehicleId($id);
			return $vehicles;
			} catch(Error $error){
				echo "Error: " . $error->getMessage();
			}
	}

	public static function renderDriverHTML(Event $event)
	{

	}

	public static function postVehicleTestData()
	{
		try
		{

			// Generate Test Data
			$vehicle = array("testpostman", 1, 1);
			$vehicleRepository = new VehicleRepository();
			$vehicleRepository->postVehicleByVehicle($vehicle);

		} catch(Error $error){
			echo "Error: " . $error->getMessage();
		}

	}

	public static function putVehicleTestData()
	{
		try
		{

			// Generate Test Data
			$vehicle = array("testpostman", 1, 1);
			$vehicleRepository = new VehicleRepository();
			$vehicleRepository->putVehicleByVehicle($vehicle);

		} catch(Error $error){
			echo "Error: " . $error->getMessage();
		}
	}
}