<?php
namespace QControl\Site\Repository;

use QControl\Site\Models\Vehicle;
use QControl\Site\HttpApi\VehicleHttp;

class VehicleRepository{

	public function getAllVehicles()
	{
		$vehicles = [];
		$vehicleHttp = new VehicleHttp();
		$result = $vehicleHttp->setUpGetAllCall();

		foreach($result as $value)
		{
			$vehicle = Vehicle::fromState($value);
			array_push($vehicles, $vehicle);

		}

		return $vehicles;
	}

	public function getVehicleByVehicleId($vehicleId)
	{
		$vehicleHttp = new VehicleHttp();
		$result = $driverHttp->setUpGetByIdCall($id);
		$vehicle = Vehicle::fromState($result);
		return $driver;
	}



}