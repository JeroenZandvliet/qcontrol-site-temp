<?php
namespace QControl\Site\Models;

class Event{
	public $id;
	public $name;
	public $description;
	public $location;
	public $date;
	public $visible;


	public static function createNew($name, $description, $location, $date): self
	{
		
	}

	public static function fromState(array $state): self
	{
		$this->__construct();
	}

	private function __construct()
	{
		$this->$id = $id;
		$this->$name = $name;
		$this->$description = $description;
		$this->$location = $location;
		$this->$date = $date;
		$this->$visible = $visible;
	}
}	