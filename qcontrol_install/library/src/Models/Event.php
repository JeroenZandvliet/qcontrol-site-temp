<?php
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


	public static function createNew(array $new)
	{
		$event = new Event($new);
		return $event;
	}

	public static function fromState(array $existing): self
	{
		$event = new Event($existing);
		return $event;
	}

	private function __construct(array $data)
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