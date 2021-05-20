<?php
namespace QControl\Site\Repository;

// no direct access
defined('_JEXEC') or die('Restricted access');

use QControl\Site\Models\Event;
use QControl\Site\Models\SimplifiedEvent;
use QControl\Site\Models\RaceEvent;
use QControl\Site\HttpApi\EventHttp;
use QControl\Site\HttpApi\RaceEventHttp;
use QControl\Site\HttpApi\EventParticipationHttp;

class EventRepository{


	function getAllEvents()
	{
		$result;
		$eventHttp = new EventHttp();
		$result = $eventHttp->setUpGetAllCall();

		$events = []; 
		if(is_array($result)){
			foreach($result as $value){
				$events[] = (SimplifiedEvent::fromState($value));
			}
		}
		return $events;
	}

	function getEventById($id)
	{
		$eventHttp = new EventHttp();
		$result = $eventHttp->setUpGetByIdCall($id);
		$event = Event::fromState($result);
		return $event;
	}


	function getRaceEventById($idArray)
	{


		$raceEventHttp = new RaceEventHttp();
		$result = $raceEventHttp->setUpGetByIdCall($idArray);
		$raceEvent = RaceEvent::fromState($result);
		return $raceEvent;
	}


	function getEventParticipationsById($id)
	{
		$eventParticipationHttp = new EventParticipationHttp();
		$result = $eventParticipationHttp->setUpGetByIdCall($id);		
		return $result;
	}
}