<?php
namespace QControl\Site\Models;

class Driver{
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
		$driver = new Driver($new);
		return $driver;
	}

	public static function fromState(array $existing): self
	{
		$driver = new Driver($existing);
		return $driver;
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
		$this->driver = $data['driver'];
	}
}