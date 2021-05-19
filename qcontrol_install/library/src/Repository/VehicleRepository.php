<?php
namespace QControl\Site\Repository;

// no direct access
defined('_JEXEC') or die('Restricted access');

use QControl\Site\Models\Vehicle;
use QControl\Site\Models\SimplifiedVehicle;
use QControl\Site\HttpApi\VehicleHttp;

class VehicleRepository{

	function getAllVehicles()
	{
		$vehicleHttp = new VehicleHttp();
		$result = $vehicleHttp->setUpGetAllCall();

		foreach($result as $value){
			$vehicles[] = (SimplifiedVehicle::fromState($value));
		}

		return $vehicles;
	}

	function getVehicleByVehicleId($id)
	{
		$vehicleHttp = new VehicleHttp();
		$result = $vehicleHttp->setUpGetByIdCall($id);
		$vehicle = Vehicle::fromState($result);
		return $vehicle;
	}



}