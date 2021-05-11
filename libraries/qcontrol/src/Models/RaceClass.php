<?php
namespace QControl\Site\Models;

class RaceClass{
	public $name;
	public $raceGroups = [];
	public $id;


	public static function createNew(array $new)
	{
		$raceClass = new RaceClass($new);
		return $raceClass;
	}

	public static function fromState(array $existing): self
	{
		$raceClass = new RaceClass($existing);
		return $raceClass;
	}
	 


	private function __construct(array $data)
	{
		$this->name = $data['name'];
		$this->id = $data['id'];
		if(array_key_exists('raceGroups', $data)){
			$this->raceGroups = $data['raceGroups'];
		}
	}
}
