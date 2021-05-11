<?php
namespace QControl\Site\Repository;

use QControl\Site\Models\Vehicle;
use QControl\Site\HttpApi\VehicleHttp;

class VehicleRepository{

	function getAllDrivers()
	{
		$vehicleHttp = new VehicleHttp();
		$result = $vehicleHttp->setUpGetAllCall();

		foreach($result as $value)
		{
			$vehicles[] = Vehicle::fromState($value);
		}

		return $drivers;
	}

	function getVehicleByVehicleId($vehicleId)
	{
		$vehicleHttp = new VehicleHttp();
		$result = $driverHttp->setUpGetByIdCall($id);
		$vehicle = Vehicle::fromState($result);
		return $driver;
	}



}