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

	private $eventHttp;
	public function __construct(EventHttp $EventHttp)
	{
		$this->eventHttp = $EventHttp;
	}

	function getAllEvents()
	{

		$results = $this->eventHttp->setUpGetAllCall();
		$events = $this->fillInEventModels($results);
		return $events;
	}

	function getEventById($id)
	{

		$eventHttp = new EventHttp();
		$result = $eventHttp->setUpGetByIdCall($id);

		$event = $this->fillInEventModel($result);
		return $event;
	}

	function getRaceEventById($idArray)
	{

		$raceEventHttp = new RaceEventHttp();
		$result = $raceEventHttp->setUpGetByIdCall($idArray);
		if(is_array($result)){
			$raceEvent = RaceEvent::fromState($result);
		} else {
			$raceEvent = $result;
		}
		return $raceEvent;
	}

	function getEventParticipationsById($id)
	{
		$eventParticipationHttp = new EventParticipationHttp();
		$result = $eventParticipationHttp->setUpGetByIdCall($id);		
		return $result;
	}

	function fillInEventModels($results)
	{
		$events = []; 
		if(is_array($results)){
			foreach($results as $value){
				$events[] = (SimplifiedEvent::fromState($value));
			}
		}
		return $events;

	}

	function fillInEventModel($result)
	{
		$event = Event::fromState($result);
		return $event;
	}
}