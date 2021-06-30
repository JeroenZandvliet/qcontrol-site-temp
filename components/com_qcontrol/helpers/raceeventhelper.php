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
use QControl\Site\Models\RaceEvent;
use QControl\Site\QControlFactory;

class RaceeventComponentHelper
{

	// idArray should be [eventId, raceEventId]
	public static function getRaceEventInfo($idArray)
	{
		try
		{
			$eventRepository = QControlFactory::getEventRepository();
			$event = $eventRepository->getRaceEventById($idArray);
			return $event;
		} catch (Error $error)
		{
			echo "Error: " . $error->getMessage();
		}
	}

	public static function renderParticipationNameListHTML(RaceEvent $raceEvent)
	{
		$participationNameListHtml = "";

		forEach($raceEvent->participations as $participation){
			forEach($participation->drivers as $driver){
				$participationNameListHtml .= $driver->driver->firstName . " ";
				$participationNameListHtml .= $driver->driver->lastName . "<br>";
			}

		}
		return $participationNameListHtml;
	}

	public static function renderRaceEventHTML(RaceEvent $raceEvent)
	{
		try{
			$raceEventHTML = "";
			$raceEventHTML .= "Title: ".$raceEvent->title. "<br>";
			$raceEventHTML .= "Date: ".$raceEvent->date."<br>";
			$raceEventHTML .= "Description: ".$raceEvent->description. "<br>";
			$raceEventHTML .= "Event Id: ".$raceEvent->eventId."<br>";


			foreach($raceEvent->raceEventEventRaceClasses as $raceClass)
			{
				$raceEventHTML .= "RaceClass Name: ".$raceClass->name."<br>";
				foreach($raceClass->raceGroups as $raceGroup){
					$raceEventHTML .= "Racegroup name: ".$raceGroup['name']."<br>";
				}
			}

			foreach($raceEvent->participations as $participation)
			{
				$raceEventHTML .= "Race Nummer: ".$participation->raceNr."<br>";
				$raceEventHTML .= "Start Nummer: ".$participation->startNr."<br>";


				foreach($participation->drivers as $singleDriver)
				{
					$raceEventHTML .= "Participation Id: ".$singleDriver->participationId."<br>";
					$raceEventHTML .= "Team Member Id: ".$singleDriver->teamMemberId."<br>";
					$raceEventHTML .= "Is Main Driver: ".$singleDriver->mainDriver."<br>";
					$raceEventHTML .= "Has License: ".$singleDriver->hasLicense."<br>";
					$raceEventHTML .= "Has paid: ".$singleDriver->hasPaid."<br>";
					$raceEventHTML .= "Indemnity Signed: ".$singleDriver->indemnitySigned."<br>";
					$raceEventHTML .= "Briefing Signed: ".$singleDriver->briefingSigned."<br>";
					$raceEventHTML .= "Clothing Approved: ".$singleDriver->clothingApproved."<br>";
					$raceEventHTML .= "Payment Method: ".$singleDriver->paymentMethod."<br>";


					foreach($singleDriver->driver as $subDriver)
					{
						$raceEventHTML .= $subDriver."<br>";
					}
				}

				$raceEventHTML .= "Id: ".$participation->id."<br>";
			}

			return $raceEventHTML;
		}
	catch (Error $error){
		echo "Error: " . $error->getMessage();
	}
	}
}