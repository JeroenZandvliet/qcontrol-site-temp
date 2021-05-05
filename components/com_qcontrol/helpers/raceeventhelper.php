<?php
/**
 * Helper class for Agenda Component
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
use QControl\Site\Models\RaceEvent;

class RaceeventComponentHelper
{

	public static function getRaceEventInfo($id)
	{

		$eventRepository = new EventRepository();
		$event = $eventRepository->getRaceEventById($id);
		return $event;

	}


	public static function renderRaceEventHTML(RaceEvent $raceEvent)
	{
		$raceEventHTML = "";
		$raceEventHTML .= "Title: ".$raceEvent->title. "<br>";
		$raceEventHTML .= "Date: ".$raceEvent->date."<br>";
		$raceEventHTML .= "Description: ".$raceEvent->description. "<br>";
		$raceEventHTML .= "Event Id: ".$raceEvent->eventId."<br>";


		foreach($raceEvent->raceEventEventRaceClasses as $raceClass){
			$raceEventHTML .= "RaceClass Name: ".$raceClass->name."<br>";
			foreach($raceClass->raceGroups as $raceGroup){
				$raceEventHTML .= "Racegroup name: ".$raceGroup['name']."<br>";
			}
		}

		foreach($raceEvent->participations as $participation){
			var_dump($participation);
			$raceEventHTML .= "Race Nummer: ".$participation->raceNr."<br>";
			$raceEventHTML .= "Start Nummer: ".$participation->startNr."<br>";
		}

		//$raceEventHTML .= "Participations: ".$raceEvent->participations;

		return $raceEventHTML;
	}
}