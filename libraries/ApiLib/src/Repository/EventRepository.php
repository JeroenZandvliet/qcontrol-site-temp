<?php
namespace QControl\Site\Repository;

use QControl\Site\Models\Event;
use QControl\Site\HttpApi\EventHttp;

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
}