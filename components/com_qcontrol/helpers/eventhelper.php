<?php
require_once(JPATH_ROOT.'/libraries/qcontrol/include.php');

// no direct access
defined('_JEXEC') or die('Restricted access');

use QControl\Site\Repository\EventRepository;
use QControl\Site\HttpApi\EventHttp;
use QControl\Site\Models\Event;

class EventComponentHelper
{
	public static function getEventById(int $id)
	{
		try{
			$eventHttp = new EventHttp();
			$eventRepository = new EventRepository($eventHttp);
			$event = $eventRepository->getEventById($id);
			return $event;
		} catch(Error $error){
			echo "Error caught:  " . $error->getMessage();
		}
	}


	public static function getEventParticipationsById(int $id)
	{
		try{

			$eventHttp = new EventHttp();
			$eventRepository = new EventRepository($eventHttp);
			$eventParticipations = $eventRepository->getEventParticipationsById($id);
			return $eventParticipations;
			
		} catch(Error $error)
		{
			echo "Error caught: " . $error->getMessage();
		}
	}

	public static function getTotalParticipationsForEvent($eventParticipations): int
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

	public static function renderEventHTML(Event $event)
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