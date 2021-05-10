<?php
namespace QControl\Site\Models;

class DriverEventData{
	public $participationId;
	public $teamMemberId;
	public $mainDriver;
	public $hasLicense;
	public $hasPaid;
	public $indemnitySigned;
	public $briefingSigned;
	public $clothingApproved;
	public $paymentMethod;
	public $driver;


	public static function createNew(array $new)
	{
		$driverEventData = new DriverEventData($new);
		return $driverEventData;
	}

	public static function fromState(array $existing): self
	{
		$driverEventData = new DriverEventData($existing);
		return $driverEventData;
	}
	 


	private function __construct(array $data)
	{
		$this->participationId = $data['participationId'];
		$this->teamMemberId = $data['teamMemberId'];
		$this->mainDriver = $data['mainDriver'];
		$this->hasLicense = $data['hasLicense'];
		$this->hasPaid = $data['hasPaid'];
		$this->indemnitySigned = $data['indemnitySigned'];
		$this->briefingSigned = $data['briefingSigned'];
		$this->clothingApproved = $data['clothingApproved'];
		$this->paymentMethod = $data['paymentMethod'];
		$this->driver = SimplifiedDriver::fromState($data['driver']);
	}
}