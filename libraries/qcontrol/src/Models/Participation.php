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

class Participation{
	public $raceNr;
	public $startNr;
	public $drivers = [];
	public $id;
	 

	/**
	 * @param array $new
	 * 
	 * @return Participation
	 */
	public static function createNew(array $new): Participation
	{
		$participation = new Participation($new);
		return $participation;
	}

	public static function fromState(array $existing): self
	{
		$participation = new Participation($existing);
		return $participation;
	}
	 


	private function __construct(array $data)
	{
		if(array_key_exists('raceNr', $data))
		{
			$this->raceNr = $data['raceNr'];
			$this->startNr = $data['startNr'];


			foreach($data['drivers'] as $dataDriver){

				$driver = DriverEventData::fromState($dataDriver);
				array_push($this->drivers, $driver);
			}

			$this->id = $data['id'];
		}
	}
}