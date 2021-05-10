<?php
namespace QControl\Site\Repository;

use QControl\Site\Models\Event;
use QControl\Site\Models\SimplifiedEvent;
use QControl\Site\Models\RaceEvent;
use QControl\Site\HttpApi\EventHttp;
use QControl\Site\HttpApi\RaceEventHttp;
use QControl\Site\HttpApi\EventParticipationHttp;

class EventRepository{


	function getAllEvents()
	{
		$eventHttp = new EventHttp();
		$result = $eventHttp->setUpGetAllCall();

		foreach($result as $value){
		$events[] = (SimplifiedEvent::fromState($value));
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


	function getEventParticipationsById($id)
	{
		$eventParticipationHttp = new EventParticipationHttp();
		$result = $eventParticipationHttp->setUpGetByIdCall($id);
		var_dump ($result['raceEvents']);
		foreach($result['raceEvents'] as $participation){

		}
		return $result['raceEvents'];
	}
}