<?php

/**
 * @package    QControl.Module
 * @author     Jeroen Zandvliet (jeroen@v-web.nl)
 * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */


require_once(JPATH_ROOT.'/libraries/qcontrol/include.php');

// no direct access
defined('_JEXEC') or die('Restricted access');

use QControl\Site\HttpApi\EventHttp;
use QControl\Site\Repository\EventRepository;
use QControl\Site\Models\Event;
use QControl\Site\Calls\CurlCalls;
use QControl\Site\QControlFactory;


class ModEventModuleHelper
{

	/**
	 * Retrieves the hello message
	 *
	 * @param   array  $params An object containing the module parameters
	 *
	 * @access public
	 */
	public static function getAllEvents()
	{

		$events = QControlFactory::getEventRepository()->getAllEvents();
		return $events;

	}

	public static function renderAllEventHTML($events): string{
		$AllEventHTML = "";

		foreach($events as $event)
		{
			$AllEventHTML .= "<tr><td>".$event->name."</td>";
			$AllEventHTML .=  "<td>: ".$event->description."</td>";
			$AllEventHTML .=  "<td>".$event->date."</td></tr>";
		}
		
		return $AllEventHTML;
	}

	public static function getOneEvent(int $id): Event
	{
		echo "MEow";
		$eventHttp = new EventHttp();
		$eventRepository = new EventRepository($eventHttp);
		$event = $eventRepository->getEventById($id);
		return $event;
	}

	
	public static function renderEventHTML(Event $event): string{
		$EventHTML = "Name: ".$event->name."<br>";
		$EventHTML .= "Description: ".$event->description."<br>";
		$EventHTML .= "Location: ".$event->location."<br>";
		$EventHTML .= "Date: ". date('d M Y, h:i:s', strtotime($event->date)) ."<br>";
		$EventHTML .= "Registration Deadline: ".date('d M Y, h:i:s', strtotime($event->registrationDeadline))."<br>";
		$EventHTML .= "Chief Scrutineer: ".$event->chiefScrutineer."<br>";
		$EventHTML .= "Steward: ".$event->steward."<br>";
		$EventHTML .= "Secretary: ".$event->secretary."<br>";
		$EventHTML .= "Visible: ".$event->visible."<br>";
		$EventHTML .= "Physical Briefing: ".$event->physicalBriefing."<br>";
		$EventHTML .= "Event Raceclasses: <br><br>";

		foreach($event->eventRaceClasses as $value){
			$EventHTML .=( "Raceclass: ".$value['raceClass']['name']."<br>");
		}
		$EventHTML .= "Race Events: <br><br>";

		foreach($event->raceEvents as $value){
			$EventHTML .=( "Race Event: ".$value['title']."<br>");
		}
		return $EventHTML;
	}
	
}