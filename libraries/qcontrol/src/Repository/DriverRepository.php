<?php
namespace QControl\Site\Repository;

// no direct access
defined('_JEXEC') or die('Restricted access');

use QControl\Site\Models\SimplifiedDriver;
use QControl\Site\Models\Profile;
use QControl\Site\Models\DriverEventData;
use QControl\Site\HttpApi\DriverHttp;

class DriverRepository{

	function getAllDrivers()
	{
		$driverHttp = new DriverHttp();
		$result = $driverHttp->setUpGetAllCall();

		if(!empty($result)){
			foreach($result as $value)
			{
				$drivers[] = (SimplifiedDriver::fromState($value));
			}
			return $drivers;
		}



	}

	function getDriverById($id)
	{
		$driverHttp = new DriverHttp();
		$result = $driverHttp->setUpGetByIdCall($id);
		if(!empty($result)){
			$fullDriver = Profile::fromState($result);
			return $fullDriver;
		}
		return null;
	}

	// Added to DriverRepository because it is an element of a Driver
	function getVehiclesByDriverId($driverId)
	{

	}

}