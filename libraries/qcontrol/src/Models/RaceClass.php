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

class RaceClass{
	public $name;
	public $raceGroups = [];
	public $id;


	/**
	 * @param array $new
	 * 
	 * @return RaceClass
	 */
	public static function createNew(array $new): RaceClass
	{
		$raceClass = new RaceClass($new);
		return $raceClass;
	}

	/**
	 * @param array $existing
	 * 
	 * @return RaceClass
	 */
	public static function fromState(array $existing): RaceClass
	{
		$raceClass = new RaceClass($existing);
		return $raceClass;
	}
	 
	/**
	 * @param array $data
	 */
	private function __construct(array $data)
	{
		$this->name = $data['name'];
		$this->id = $data['id'];
		if(array_key_exists('raceGroups', $data)){
			$this->raceGroups = $data['raceGroups'];
		}
	}
}
