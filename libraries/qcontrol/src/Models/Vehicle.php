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

class Vehicle{
	public $name;
	public $model;
	public $brand;
	public $teamId;
	public $team;
	public $id;


	public static function createNew(array $new)
	{
		$vehicle = new Vehicle($new);
		return $vehicle;
	}

	public static function fromState(array $existing): self
	{
		$vehicle = new Vehicle($existing);
		return $vehicle;
	}
	 


	private function __construct(array $data)
	{
		$this->name = $data['name'];
		$this->model = $data['model'];
		$this->brand = $data['brand'];
		$this->teamId = $data['teamId'];
		$this->team = $data['team'];
		$this->id = $data['id'];
	}
}
