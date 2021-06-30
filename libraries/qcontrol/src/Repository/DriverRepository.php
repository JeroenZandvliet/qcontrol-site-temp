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

use QControl\Site\Models\SimplifiedDriver;
use QControl\Site\Models\Profile;
use QControl\Site\Models\DriverEventData;
use QControl\Site\HttpApi\DriverHttp;
use QControl\Site\QControlFactory;

class DriverRepository{

	private $driverHttp;
	public function __construct(DriverHttp $driverHttp)
	{
		$this->driverHttp = $driverHttp;
	}


	/**
	 * @return SimplifiedDriver
	 */
	function getAllDrivers() : array
	{
		$driverHttp = QControlFactory::getDriverHttp();
		$result = $driverHttp->setUpGetAllCall();

		if(!empty($result)){
			foreach($result as $value)
			{
				$drivers[] = (SimplifiedDriver::fromState($value));
			}
			return $drivers;
		}



	}

	/**
	 * @param mixed $id
	 * 
	 * @return Profile
	 */
	function getDriverById($id) : Profile
	{
		$driverHttp = QControlFactory::getDriverHttp();
		$result = $driverHttp->setUpGetByIdCall($id);
		if(!empty($result)){
			$fullDriver = Profile::fromState($result);
			return $fullDriver;
		}

	}

	/**
	 * @param mixed $driverId
	 * 
	 * @return Vehicle
	 */
	function getVehiclesByDriverId($driverId): Vehicle
	{

	}

}