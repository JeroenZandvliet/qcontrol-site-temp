<?php
namespace QControl\Site\Models;

// no direct access
defined('_JEXEC') or die('Restricted access');

class PutVehicle{
	public $model;
	public $brandName;
	public $brandId;
	public $teamId;
	public $id;


	public static function createNew(array $new)
	{
		$vehicle = new PutVehicle($new);
		return $vehicle;
	}

	public static function fromState(array $existing): self
	{
		$vehicle = new PutVehicle($existing);
		return $vehicle;
	}
	 


	private function __construct(array $data)
	{

		$this->model = $data['model'];
		$this->brandName = $data['brandName'];
		$this->brandId = $data['brandId'];
		$this->teamId = $data['teamId'];
		$this->id = $data['id'];
	}
}
