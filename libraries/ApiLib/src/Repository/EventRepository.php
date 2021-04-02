<?php
namespace QControl\Site\Repository;

use QControl\Site\Models\Event;
use QControl\Site\HttpApi\EventHttp;

class EventRepository{

	function getOneEvent(){
		$eventHttp = new EventHttp();
		$result = $eventHttp->setUpGetAllCall();

		$event = Event::createNew($result[0]);
		return $event;
	}

}