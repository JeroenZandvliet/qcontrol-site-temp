<?php

/**
 * @package    QControl.Library
 * @author     Jeroen Zandvliet (jeroen@v-web.nl)
 * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace QControl\Site\Models;

// no direct access
defined('_JEXEC') or die('Restricted access');

class Event{

	public $id;
	public $name;
	public $description;
	public $location;
	public $date;
	public $registrationDeadline;
	public $chiefScrutineer;
	public $raceDirector;
	public $steward;
	public $secretary;
	public $visible;
	public $physicalBriefing;
	public $eventRaceClasses;
	public $raceEvents;


	/**
	 * @param array $new
	 * 
	 * @return Event
	 */
	public static function createNew(array $new): Event
	{
		$event = new Event($new);
		return $event;
	}

	/**
	 * @param array $existing
	 * 
	 * @return Event
	 */
	public static function fromState(array $existing): Event
	{
		$event = new Event($existing);
		return $event;
	}

	/**
	 * @param array $data
	 */
	private function __construct(array $data)
	{
		if(array_key_exists('id', $data))
		{
			$this->id = $data['id'];
			$this->name = $data['name'];
			$this->description = $data['description'];
			$this->location = $data['location'];
			$this->date = $data['date'];
			$this->registrationDeadline = $data['registrationDeadline'];
			$this->chiefScrutineer = $data['chiefScrutineer'];
			$this->raceDirector = $data['raceDirector']; 
			$this->steward = $data['steward']; 
			$this->secretary = $data['secretary'];
			$this->visible = $data['visible']; 
			$this->physicalBriefing = $data['physicalBriefing'];
			$this->eventRaceClasses = $data['eventRaceClasses'];
			$this->raceEvents = $data['raceEvents'];
			$this->visible = $data['visible'];
		}
	}
}	