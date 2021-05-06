<?php
require_once(JPATH_ROOT.'/libraries/ApiLib/include.php');

use QControl\Site\Repository\EventRepository;
use QControl\Site\Models\Event;

class EventComponentHelper
{
	public static function getEventById(int $id): Event
	{
		try{
			$eventRepository = new EventRepository();
			$event = $eventRepository->getEventById($id);
			return $event;
		} catch(Error $error){
			echo "Error caught:  " . $error->getMessage();
		}
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