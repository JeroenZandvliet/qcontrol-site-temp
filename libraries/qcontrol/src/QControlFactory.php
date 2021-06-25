<?php
namespace QControl\Site;

// no direct access
defined('_JEXEC') or die('Restricted access');

use QControl\Site\HttpApi\AuthorizationHttp;
use QControl\Site\HttpApi\DriverHttp;
use QControl\Site\HttpApi\EventHttp;
use QControl\Site\HttpApi\VehicleHttp;
use QControl\Site\Repository\AuthorizationRepository;
use QControl\Site\Repository\DriverRepository;
use QControl\Site\Repository\EventRepository;
use QControl\Site\Repository\VehicleRepository;
use QControl\Site\Models\Event;
use QControl\Site\Calls\CurlCalls;

class QControlFactory
{
	
	public static function getAuthorizationRepository(): AuthorizationRepository
	{
		$curlCall = new CurlCalls();
		$authorizationHttp = new AuthorizationHttp($curlCall);
		$authorizationRepository = new AuthorizationRepository($authorizationHttp);
		return $authorizationRepository;
	}

	public static function getDriverRepository() : DriverRepository
	{
		$curlCall = new CurlCalls();
		$driverHttp = new DriverHttp($curlCall);
		$driverRepository = new DriverRepository($driverHttp);
		return $driverRepository;
	}

	public static function getEventRepository() : EventRepository
	{
		$curlCall = new CurlCalls();
		$eventHttp = new EventHttp($curlCall);
		$eventRepository = new EventRepository($eventHttp);
		return $eventRepository;
	}

	public static function getVehicleRepository() : VehicleRepository
	{
		$curlCall = new CurlCalls();
		$vehicleHttp = new VehicleHttp($curlCall);
		$vehicleRepository = new VehicleRepository($vehicleHttp);
		return $vehicleRepository;
	}



	public static function getAuthorizationHttp(): AuthorizationHttp
	{
		$curlCall = new CurlCalls();
		$authorizationHttp = new AuthorizationHttp($curlCall);
		return $authorizationHttp;
	}

	public static function getDriverHttp() : DriverHttp
	{
		$curlCall = new CurlCalls();
		$driverHttp = new DriverHttp($curlCall);
		return $driverHttp;
	}

	public static function getEventHttp() : EventHttp
	{
		$curlCall = new CurlCalls();
		$eventHttp = new EventHttp($curlCall);
		return $eventHttp;
	}

	public static function getEventParticipationHttp() : EventParticipationHttp
	{
		$curlCall = new CurlCalls();
		$eventParticipationHttp = new EventParticipationHttp($curlCall);
		return $eventParticipationHttp;
	}	

	public static function getRaceEventHttp() : getRaceEventHttp
	{
		$curlCall = new CurlCalls();
		$raceEventHttp = new getRaceEventHttp($curlCall);
		return $raceEventHttp;
	}		

	public static function getVehicleHttp() : VehicleHttp
	{
		$curlCall = new CurlCalls();
		$vehicleHttp = new VehicleHttp($curlCall);
		return $vehicleHttp;
	}

}