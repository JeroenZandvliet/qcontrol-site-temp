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

class SimplifiedVehicle{
	public $name;
	public $model;
	public $brand;
	public $teamId;
	public $team;
	public $id;


	/**
	 * @param array $new
	 * 
	 * @return SimplifiedEvent
	 */
	public static function createNew(array $new): SimplifiedEvent
	{
		$vehicle = new SimplifiedVehicle($new);
		return $vehicle;
	}

	/**
	 * @param array $existing
	 * 
	 * @return SimplifiedEvent
	 */
	public static function fromState(array $existing): SimplifiedEvent
	{
		$vehicle = new SimplifiedVehicle($existing);
		return $vehicle;
	}
	 

	/**
	 * @param array $data
	 */
	private function __construct(array $data)
	{
		$this->name = $data['name'];
		$this->model = $data['model'];
		$this->brand = $data['brand'];
		$this->id = $data['id'];
	}
}
