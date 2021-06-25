<?php
namespace QControl\Site\Repository;

// no direct access
defined('_JEXEC') or die('Restricted access');

use QControl\Site\Models\Vehicle;
use QControl\Site\Models\PutVehicle;
use QControl\Site\Models\SimplifiedVehicle;
use QControl\Site\HttpApi\VehicleHttp;
use QControl\Site\QControlFactory;

class VehicleRepository
{


	private $vehicleHttp;
	public function __construct(VehicleHttp $vehicleHttp)
	{
		$this->vehicleHttp = $vehicleHttp;
	}


	function getAllVehicles()
	{
		$vehicleHttp = QControlFactory::getVehicleHttp();
		$result = $vehicleHttp->setUpGetAllCall();

		if(!empty($result)){
			foreach($result as $value){
				$vehicles[] = SimplifiedVehicle::fromState($value);
			}
		}
		return $vehicles;

	}


	function getVehicleByVehicleId($id)
	{
		$vehicleHttp = new VehicleHttp();
		$result = $vehicleHttp->setUpGetByIdCall($id);

		if(!empty($result)){
			$vehicle = Vehicle::fromState($result);
			return $vehicle;
		}
		return null;
	}

	function postVehiclebyVehicle($vehicle)
	{
		$vehicleHttp = new VehicleHttp();
		$result = $vehicleHttp->setUpPostCall($vehicle);
		return $result;
	}

	function putVehicleByVehicle(){

		// Generate
		$vehicle = array("id"=>43, "model"=>301, "brandName"=>"Kaas", "brandId"=>0, "teamId"=>0);
			
		$vehicles = PutVehicle::fromState($vehicle);

		$vehicleHttp = new VehicleHttp();
		$result = $vehicleHttp->setUpPutCall($vehicle);
		return $result;
	}

	function deleteVehicleById($vehicleId){

		$vehicleHttp = new VehicleHttp();
		$vehicleHttp->setUpDeleteCall($vehicleId);
	}



}