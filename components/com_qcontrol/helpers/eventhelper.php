<?php

/**
 * @package    QControl.Component
 * @author     Jeroen Zandvliet (jeroen@v-web.nl)
 * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

require_once(JPATH_ROOT.'/libraries/qcontrol/include.php');

// no direct access
defined('_JEXEC') or die('Restricted access');

use QControl\Site\Repository\EventRepository;
use QControl\Site\HttpApi\EventHttp;
use QControl\Site\Models\Event;
use QControl\Site\QControlFactory;

class EventComponentHelper
{
	/**
	 * @param int $id
	 * 
	 * @return Event
	 */
	public static function getEventById(int $id): Event
	{
		try{

			$eventRepository = QControlFactory::getEventRepository();
			$event = $eventRepository->getEventById($id);
			return $event;
		} catch(Error $error){
			echo "Error caught:  " . $error->getMessage();
		}
	}


	/**
	 * @param int $id
	 * 
	 * @return array
	 */
	public static function getEventParticipationsById(int $id): array
	{
		try{

			$eventRepository = QControlFactory::getEventRepository();
			$eventParticipations = $eventRepository->getEventParticipationsById($id);
			return $eventParticipations;
			
		} catch(Error $error)
		{
			echo "Error caught: " . $error->getMessage();
		}
	}

	/**
	 * @param array $eventParticipations
	 * 
	 * @return int
	 */
	public static function getTotalParticipationsForEvent(array $eventParticipations): int
	{
		$result = 0;

		if(!empty($eventParticipations)){
			forEach($eventParticipations['raceEvents'] as $raceEvent)
			{
	
				forEach($raceEvent['participations'] as $participation)
				{
					$result += intval(count($participation['drivers']));
				}
			}
			return $result;
		}

		return -1;

	}

	/**
	 * @param Event $event
	 * 
	 * @return string
	 */
	public static function renderEventHTML(Event $event): string
	{
		try{

			$EventHTML = "<div class='flex-event-container'>";

			$EventHTML .= "<div class='flex-event-child'>";
			$EventHTML .= "<h1>Name: " .$event->name. "</h1><br>";
			$EventHTML .= "Description: " .$event->description. "</div><br>";

			$EventHTML .= "<div class='flex-event-child'>";
			$EventHTML .= "Date: " .date('d M Y', strtotime($event->date)). "<br>";
			$EventHTML .= "Location: " .$event->location. "<br>";
			$EventHTML .= "ChiefScrutineer: " .$event->chiefScrutineer. "<br>";
			$EventHTML .= "RaceDirector: " .$event->raceDirector. "<br>";
			$EventHTML .= "Steward: " .$event->steward. "<br>";
			$EventHTML .= "Secretary: " .$event->secretary. "<br>";
			$EventHTML .= "RegistrationDeadline: " . date('d M Y, h:i:s', strtotime($event->registrationDeadline)). "<br>";


			foreach($event->eventRaceClasses as $RaceClass)
			{
				$EventHTML .= "RaceClass: ".$RaceClass['raceClass']['name']. "<br>";
			}

			foreach($event->raceEvents as $RaceEvent)
			{
				$EventHTML .= "RaceEvent: ".$RaceEvent['title']. "<br>";
			}
			$EventHTML .= "</div></div>";

			return $EventHTML;
		} catch (Error $error){
			return "Error caught: " . $error->getMessage();
		}
	}
}		