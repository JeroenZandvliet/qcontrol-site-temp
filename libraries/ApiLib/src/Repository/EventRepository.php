<?php
namespace QControl\Site\Repository;

use QControl\Site\Models\Event;
use QControl\Site\Models\RaceEvent;
use QControl\Site\HttpApi\EventHttp;
use QControl\Site\HttpApi\RaceEventHttp;

class EventRepository{


	function getAllEvents()
	{
		$eventHttp = new EventHttp();
		$result = $eventHttp->setUpGetAllCall();

		foreach($result as $value){
		$events[] = (Event::fromState($value));
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


	function getRaceEventById($id)
	{
		$raceEventHttp = new RaceEventHttp();
		$result = $raceEventHttp->setUpGetByIdCall($id);
		$raceEvent = RaceEvent::fromState($result);
		return $raceEvent;
	}
}