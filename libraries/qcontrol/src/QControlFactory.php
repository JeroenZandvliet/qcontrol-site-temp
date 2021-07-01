<?php

/**
 * @package    QControl.Library
 * @author     Jeroen Zandvliet (jeroen@v-web.nl)
 * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace QControl\Site;

// no direct access
defined('_JEXEC') or die('Restricted access');

use QControl\Site\HttpApi\AuthorizationHttp;
use QControl\Site\HttpApi\DriverHttp;
use QControl\Site\HttpApi\EventHttp;
use QControl\Site\HttpApi\EventParticipationHttp;
use QControl\Site\HttpApi\RaceEventHttp;
use QControl\Site\HttpApi\VehicleHttp;
use QControl\Site\Repository\AuthorizationRepository;
use QControl\Site\Repository\DriverRepository;
use QControl\Site\Repository\EventRepository;
use QControl\Site\Repository\VehicleRepository;
use QControl\Site\Models\Event;
use QControl\Site\Calls\CurlCalls;

class QControlFactory
{
	
	/**
	 * @return AuthorizationRepository
	 */
	public static function getAuthorizationRepository(): AuthorizationRepository
	{
		$curlCall = new CurlCalls();
		$authorizationHttp = new AuthorizationHttp($curlCall);
		$authorizationRepository = new AuthorizationRepository($authorizationHttp);
		return $authorizationRepository;
	}

	/**
	 * @return DriverRepository
	 */
	public static function getDriverRepository() : DriverRepository
	{
		$curlCall = new CurlCalls();
		$driverHttp = new DriverHttp($curlCall);
		$driverRepository = new DriverRepository($driverHttp);
		return $driverRepository;
	}

	/**
	 * @return EventRepository
	 */
	public static function getEventRepository() : EventRepository
	{
		$curlCall = new CurlCalls();
		$eventHttp = new EventHttp($curlCall);
		$eventRepository = new EventRepository($eventHttp);
		return $eventRepository;
	}

	/**
	 * @return VehicleRepository
	 */
	public static function getVehicleRepository() : VehicleRepository
	{
		$curlCall = new CurlCalls();
		$vehicleHttp = new VehicleHttp($curlCall);
		$vehicleRepository = new VehicleRepository($vehicleHttp);
		return $vehicleRepository;
	}



	/**
	 * @return AuthorizationHttp
	 */
	public static function getAuthorizationHttp(): AuthorizationHttp
	{
		$curlCall = new CurlCalls();
		$authorizationHttp = new AuthorizationHttp($curlCall);
		return $authorizationHttp;
	}

	/**
	 * @return DriverHttp
	 */
	public static function getDriverHttp() : DriverHttp
	{
		$curlCall = new CurlCalls();
		$driverHttp = new DriverHttp($curlCall);
		return $driverHttp;
	}

	/**
	 * @return EventHttp
	 */
	public static function getEventHttp() : EventHttp
	{
		$curlCall = new CurlCalls();
		$eventHttp = new EventHttp($curlCall);
		return $eventHttp;
	}

	/**
	 * @return EventParticipationHttp
	 */
	public static function getEventParticipationHttp() : EventParticipationHttp
	{
		$curlCall = new CurlCalls();
		$eventParticipationHttp = new EventParticipationHttp($curlCall);
		return $eventParticipationHttp;
	}	

	/**
	 * @return RaceEventHttp
	 */
	public static function getRaceEventHttp() : RaceEventHttp
	{
		$curlCall = new CurlCalls();
		$raceEventHttp = new RaceEventHttp($curlCall);
		return $raceEventHttp;
	}		

	/**
	 * @return VehicleHttp
	 */
	public static function getVehicleHttp() : VehicleHttp
	{
		$curlCall = new CurlCalls();
		$vehicleHttp = new VehicleHttp($curlCall);
		return $vehicleHttp;
	}

}