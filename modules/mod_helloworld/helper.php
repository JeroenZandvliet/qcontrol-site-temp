<?php
/**
 * Helper class for Hello World! module
 * 
 * @package    Joomla.Tutorials
 * @subpackage Modules
 * @link http://docs.joomla.org/J3.x:Creating_a_simple_module/Developing_a_Basic_Module
 * @license        GNU/GPL, see LICENSE.php
 * mod_helloworld is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */

require_once(JPATH_ROOT.'/libraries/ApiLib/include.php');

use QControl\Site\Repository\EventRepository;

class ModHelloWorldHelper
{
	/**
	 * Retrieves the hello message
	 *
	 * @param   array  $params An object containing the module parameters
	 *
	 * @access public
	 */
	public static function getAllEvents($params)
	{


		$eventRepository = new EventRepository();
		$events = $eventRepository->getAllEvents();
	

		foreach($events as $event)
		{
			echo "Name: ".$event->name."<br>";
			echo "Description: ".$event->description."<br>";
			echo "Date: ".$event->date."<br>";
		}

	}

	public static function getOneEvent($id)
	{

		$eventRepository = new EventRepository();
		$event = $eventRepository->getEventById($id);
		self::display($event);
	}

	public static function display($event){
		echo "Name: ".$event->name."<br>";
		echo "Description: ".$event->description."<br>";
		echo "Location: ".$event->location."<br>";
		echo "Date: ". date('d M Y, h:i:s', strtotime($event->date)) ."<br>";
		echo "Registration Deadline: ".date('d M Y, h:i:s', strtotime($event->registrationDeadline))."<br>";
		echo "Chief Scrutineer: ".$event->chiefScrutineer."<br>";
		echo "Steward: ".$event->steward."<br>";
		echo "Secretary: ".$event->secretary."<br>";
		echo "Visible: ".$event->visible."<br>";
		echo "Physical Briefing: ".$event->physicalBriefing."<br>";
		echo "Event Raceclasses: <br><br>";

		foreach($event->eventRaceClasses as $value){
			echo( "Raceclass: ".$value['raceClass']['name']."<br>");
		}
		echo "Race Events: <br><br>";

		foreach($event->raceEvents as $value){
			echo( "Race Event: ".$value['title']."<br>");
		}
	}

	
}