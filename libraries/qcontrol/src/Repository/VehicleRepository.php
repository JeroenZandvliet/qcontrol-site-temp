<?php

/**
 * @package    QControl.Library
 * @author     Jeroen Zandvliet (jeroen@v-web.nl)
 * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace QControl\Site\Repository;

// no direct access
defined('_JEXEC') or die('Restricted access');

use QControl\Site\HttpApi\VehicleHttp;
use QControl\Site\QControlFactory;
use QControl\Site\Models\Vehicle;
use QControl\Site\Models\PutVehicle;
use QControl\Site\Models\SimplifiedVehicle;


class VehicleRepository
{


	private $vehicleHttp;
	public function __construct(VehicleHttp $vehicleHttp)
	{
		$this->vehicleHttp = $vehicleHttp;
	}


	function getAllVehicles(): array
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


	/**
	 * @param int $id
	 * 
	 * @return Vehicle
	 */ 
	function getVehicleByVehicleId(int $id): Vehicle
	{
		$vehicleHttp = QControlFactory::getVehicleHttp();
		$result = $vehicleHttp->setUpGetByIdCall($id);

		if(!empty($result)){
			$vehicle = Vehicle::fromState($result);
			return $vehicle;
		}
		return null;
	}


	/**
	 * @param Vehicle $vehicle
	 * 
	 */
	function postVehiclebyVehicle(Vehicle $vehicle)
	{
		$vehicleHttp = QControlFactory::getVehicleHttp();
		$result = $vehicleHttp->setUpPostCall($vehicle);
		return $result;
	}

	function putVehicleByVehicle(){

		$vehicle = array("id"=>43, "model"=>301, "brandName"=>"Kaas", "brandId"=>0, "teamId"=>0);
			
		$vehicles = PutVehicle::fromState($vehicle);

		$vehicleHttp = QControlFactory::getVehicleHttp();
		$result = $vehicleHttp->setUpPutCall($vehicle);
		return $result;
	}

	/**
	 * @param mixed $vehicleId
	 * 
	 */
	function deleteVehicleById($vehicleId){

		$vehicleHttp = QControlFactory::getVehicleHttp();
		$vehicleHttp->setUpDeleteCall($vehicleId);
	}



}