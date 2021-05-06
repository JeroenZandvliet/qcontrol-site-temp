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
use QControl\Site\Models\Event;

class AgendaComponentHelper
{

	public static function getAllEvents()
	{
		try{
		$eventRepository = new EventRepository();
		$events = $eventRepository->getAllEvents();
		return $events;
		} catch(Error $error){
			echo "Error: " . $error->getMessage();
		}

	}

	public static function renderAgendaHTML($events): string{

		try{
			//Flex container for all events
			$AgendaHTML = "<div class='flex-agenda-container'>";

			foreach($events as $agendaEvent)
			{	
				//Flex container for a single event
				$AgendaHTML .= "<div class='flex-agenda-child'>";


				$AgendaHTML .= "<img src='https://media.prdn.nl/harc/files/A38I5006.jpeg' alt='picture'><br>";



				$AgendaHTML .= "<div class='flex-event-container'>";
				$AgendaHTML .= "<div class='flex-event-child'>";

				$AgendaHTML .= date('d M Y', strtotime($agendaEvent->date)). "</div>";

				$AgendaHTML .= "<div class='flex-event-child'>";
				$AgendaHTML .= $agendaEvent->name. "</div>";


				$AgendaHTML .= "<div class='flex-event-child'>";
				$AgendaHTML .= $agendaEvent->location. "</div></div><br>";

				//Close flex container for a single event
				$AgendaHTML .= "</div>";
			}

			//Close flex container for all events
			$AgendaHTML .= "</div>";
			return $AgendaHTML;
		} catch (Error $error){
			echo "Error: " . $error->getMessage();
		}
	}

}