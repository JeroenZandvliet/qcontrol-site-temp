<?php
namespace QControl\Site\Models;

// no direct access
defined('_JEXEC') or die('Restricted access');

class SimplifiedVehicle{
	public $name;
	public $model;
	public $brand;
	public $teamId;
	public $team;
	public $id;


	public static function createNew(array $new)
	{
		$vehicle = new SimplifiedVehicle($new);
		return $vehicle;
	}

	public static function fromState(array $existing): self
	{
		$vehicle = new SimplifiedVehicle($existing);
		return $vehicle;
	}
	 


	private function __construct(array $data)
	{
		$this->name = $data['name'];
		$this->model = $data['model'];
		$this->brand = $data['brand'];
		$this->id = $data['id'];
	}
}
