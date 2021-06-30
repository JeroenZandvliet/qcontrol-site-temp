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

use QControl\Site\Models\Event;
use QControl\Site\Models\SimplifiedEvent;
use QControl\Site\Models\RaceEvent;
use QControl\Site\HttpApi\EventHttp;
use QControl\Site\HttpApi\RaceEventHttp;
use QControl\Site\HttpApi\EventParticipationHttp;
use QControl\Site\QControlFactory;

/**
 * 
 */
class EventRepository{

	private $eventHttp;
	/**
	 * @param EventHttp $eventHttp
	 */
	public function __construct(EventHttp $eventHttp)
	{
		$this->eventHttp = $eventHttp;
	}

	/**
	 * @return array
	 */
	function getAllEvents(): array
	{

		$eventHttp = QControlFactory::getEventHttp();
		$results = $eventHttp->setUpGetAllCall();
		$events = $this->fillInEventModels($results);
		return $events;
	}

	/**
	 * @param int $id
	 * 
	 * @return Event
	 */
	function getEventById(int $id): Event
	{

		$eventHttp = QControlFactory::getEventHttp();
		$result = $eventHttp->setUpGetByIdCall($id);

		$event = $this->fillInEventModel($result);
		return $event;
	}

	/**
	 * @param array $idArray
	 * 
	 * @return RaceEvent
	 */
	function getRaceEventById(array $idArray):RaceEvent
	{

		$raceEventHttp = QControlFactory::getRaceEventHttp();
		$result = $raceEventHttp->setUpGetByIdCall($idArray);
		if(is_array($result)){
			$raceEvent = RaceEvent::fromState($result);
		} else {
			$raceEvent = $result;
		}
		return $raceEvent;
	}

	/**
	 * @param int $id
	 * 
	 * @return array
	 */
	function getEventParticipationsById(int $id): array
	{
		$eventParticipationHttp = QControlFactory::getEventParticipationHttp();
		$result = $eventParticipationHttp->setUpGetByIdCall($id);		
		return $result;
	}


	/**
	 * @param array $results
	 * 
	 * @return array
	 */
	function fillInEventModels(array $results): array
	{
		$events = []; 
		if(is_array($results)){
			foreach($results as $value){
				$events[] = (SimplifiedEvent::fromState($value));
			}
		}
		return $events;

	}

	/**
	 * @param array $result
	 * 
	 * @return Event
	 */
	function fillInEventModel(array $result): Event
	{
		$event = Event::fromState($result);
		return $event;
	}
}