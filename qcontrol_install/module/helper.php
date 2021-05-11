<?php
/**
 * Helper class for QControl! module
 * 
 * @package    Joomla.Tutorials
 * @subpackage Modules
 * @link http://docs.joomla.org/J3.x:Creating_a_simple_module/Developing_a_Basic_Module
 * @license        GNU/GPL, see LICENSE.php
 * mod_qcontrol is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */

require_once(JPATH_ROOT.'/libraries/ApiLib/include.php');

use QControl\Site\Repository\EventRepository;
use QControl\Site\Models\Event;

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

		$eventRepository = new EventRepository();
		$events = $eventRepository->getAllEvents();
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
		$eventRepository = new EventRepository();
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