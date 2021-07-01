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

class PutVehicle{
	public $model;
	public $brandName;
	public $brandId;
	public $teamId;
	public $id;


	/**
	 * @param array $new
	 * 
	 * @return PutVehicle
	 */
	public static function createNew(array $new): PutVehicle
	{
		$vehicle = new PutVehicle($new);
		return $vehicle;
	}

	/**
	 * @param array $existing
	 * 
	 * @return PutVehicle
	 */
	public static function fromState(array $existing): PutVehicle
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
