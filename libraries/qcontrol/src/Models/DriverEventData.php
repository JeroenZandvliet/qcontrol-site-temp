<?php

/**
 * @package    QControl.Library
 * @author     Jeroen Zandvliet (jeroen@v-web.nl)
 * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace QControl\Site\Models;

// no direct access
defined('_JEXEC') or die('Restricted access');

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


	/**
	 * @param array $new
	 * 
	 * @return DriverEventData
	 */
	public static function createNew(array $new): DriverEventData
	{
		$driverEventData = new DriverEventData($new);
		return $driverEventData;
	}

	/**
	 * @param array $existing
	 * 
	 * @return DriverEventData
	 */
	public static function fromState(array $existing): DriverEventData
	{
		$driverEventData = new DriverEventData($existing);
		return $driverEventData;
	}
	 


	/**
	 * @param array $data
	 */
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