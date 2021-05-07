<?php
namespace QControl\Site\Repository;

use QControl\Site\Models\Driver;
use QControl\Site\Models\DriverEventData;
use QControl\Site\HttpApi\DriverHttp;

class VehicleRepository{

	function getAllDrivers()
	{
		$driverHttp = new DriverHttp();
		$result = $driverHttp->setUpGetAllCall();

		foreach($result as $value)
		{
			$drivers[] = (Driver::fromState($value));
		}

		return $drivers;
	}

	function getVehicleByVehicleId($vehicleId)
	{
		$vehicleHttp = new DriverHttp();
		$result = $driverHttp->setUpGetByIdCall($id);
		$driver = Driver::fromState($result);
		return $driver;
	}



}