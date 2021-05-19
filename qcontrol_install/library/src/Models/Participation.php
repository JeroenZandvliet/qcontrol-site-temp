<?php
namespace QControl\Site\Models;

// no direct access
defined('_JEXEC') or die('Restricted access');

class Participation{
	public $raceNr;
	public $startNr;
	public $drivers = [];
	public $id;
	 

	public static function createNew(array $new)
	{
		$participation = new Participation($new);
		return $participation;
	}

	public static function fromState(array $existing): self
	{
		$participation = new Participation($existing);
		return $participation;
	}
	 


	private function __construct(array $data)
	{
		$this->raceNr = $data['raceNr'];
		$this->startNr = $data['startNr'];


		foreach($data['drivers'] as $dataDriver){

			$driver = DriverEventData::fromState($dataDriver);
			array_push($this->drivers, $driver);
		}

		$this->id = $data['id'];
	}
}