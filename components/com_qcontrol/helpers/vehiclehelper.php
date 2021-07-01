<?php

/**
 * @package    QControl.Component
 * @author     Jeroen Zandvliet (jeroen@v-web.nl)
 * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */


require_once(JPATH_ROOT.'/libraries/qcontrol/include.php');

// no direct access
defined('_JEXEC') or die('Restricted access');

use QControl\Site\Repository\VehicleRepository;
use QControl\Site\Models\Vehicle;
use QControl\Site\QControlFactory;

class VehiclesComponentHelper
{

	/**
	 * @return array
	 */
	public static function retrieveAllVehicles(): array
	{
		try{
			$vehicleRepository = QControlFactory::getVehicleRepository();
			$vehicles = $vehicleRepository->getAllVehicles();
			return $vehicles;
			
			} catch(Error $error){
				echo "Error: " . $error->getMessage();
			}
	}



	/**
	 * @param int $id
	 * 
	 * @return Vehicle
	 */
	public static function getVehicleByVehicleId(int $id): Vehicle
	{
		try{
			$vehicleRepository = QControlFactory::getVehicleRepository();
			$vehicles = $vehicleRepository->getVehicleByVehicleId($id);
			return $vehicles;
			} catch(Error $error){
				echo "Error: " . $error->getMessage();
			}
	}	


	/**
	 * @return void
	 */
	public static function postVehicleTestData():void
	{
		try
		{

			// Generate Test Data
			$vehicle = array("testpostman", 1, 1);
			$vehicleRepository = QControlFactory::getVehicleRepository();
			$vehicleRepository->postVehicleByVehicle($vehicle);

		} catch(Error $error){
			echo "Error: " . $error->getMessage();
		}

	}

	/**
	 * @return void
	 */
	public static function putVehicleTestData(): void
	{
		try
		{
			$vehicleRepository = QControlFactory::getVehicleRepository();
			$vehicleRepository->putVehicleByVehicle();


		} catch(Error $error){
			echo "Error: " . $error->getMessage();
		}
	}

	/**
	 * @return void
	 */
	public static function deleteVehicleTestData(): void
	{
		try
		{
			$vehicleRepository = QControlFactory::getVehicleRepository();
			$vehicleRepository->deleteVehicleById(43);

		} catch(Error $error){
			echo "Error: " . $error->getMessage();
		}
	}

}