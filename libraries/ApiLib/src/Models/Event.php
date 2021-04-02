<?php
namespace QControl\Site\Models;

class Event{

	public $id;
	public $name;
	public $description;
	public $location;
	public $date;
	public $visible;

	public static function createNew(array $new)
	{
		var_dump($new);
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
		$this->visible = $data['visible'];
		var_dump($this);
	}
}	