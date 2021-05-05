<?php
namespace QControl\Site\Models;

use QControl\Site\Models\RaceClass;

class RaceEvent{
	public $title;
	public $date;
	public $description;
	public $licenseRequired;
	public $eventId;
	public $raceEventEventRaceClasses = [];
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

		//Seperate race class from nested array data
		foreach($data['raceEventEventRaceClasses'][0]['eventRaceClass'] as $dataRaceClass){

			//Convert and add RaceClass model
			$raceClass = RaceClass::fromState($dataRaceClass);
			array_push($this->raceEventEventRaceClasses, $raceClass);
		}

		foreach($data['participations'] as $dataParticipation){
			$participation = Participation::fromState($dataParticipation);
			array_push($this->participations, $participation);
		}

	}

}
