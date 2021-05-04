<?php
namespace QControl\Site\Models;

use QControl\Site\Models\RaceClass;

class RaceEvent{
	public $title;
	public $date;
	public $description;
	public $licenseRequired;
	public $eventId;
	public $raceEventEventRaceClasses;
	public $participations;

	public static function createNew(array $new)
	{
		$raceEvent = new RaceEvent($new);
		return $raceEvent;
	}

	public static function fromState(array $existing): self
	{
		$raceEvent = new RaceEvent($existing);
		return $raceEvent;
	}


	private function __construct(array $data)
	{
		$this->title = $data['title'];
		$this->date = $data['date'];
		$this->description = $data['description'];
		$this->eventId = $data['eventId'];
		$this->raceEventEventRaceClasses = $data['raceEventEventRaceClasses'];
		$this->participations = $data['participations'];
	}

}
