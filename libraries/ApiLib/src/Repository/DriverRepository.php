<?php
namespace QControl\Site\Repository;

use QControl\Site\Models\SimplifiedDriver;
use QControl\Site\Models\FullDriver;
use QControl\Site\Models\DriverEventData;
use QControl\Site\HttpApi\DriverHttp;

class DriverRepository{

	function getAllDrivers()
	{
		$driverHttp = new DriverHttp();
		$result = $driverHttp->setUpGetAllCall();

		foreach($result as $value)
		{
			$drivers[] = (SimplifiedDriver::fromState($value));
		}

		return $drivers;
	}

	function getDriverById($id): FullDriver
	{
		$driverHttp = new DriverHttp();
		$result = $driverHttp->setUpGetByIdCall($id);
		$fullDriver = FullDriver::fromState($result);
		return $fullDriver;
	}

	function getVehiclesByDriverId($driverId)
	{

	}

}