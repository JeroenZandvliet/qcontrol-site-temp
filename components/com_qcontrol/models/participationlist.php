<?php

/**
 * @package    QControl.Component
 * @author     Jeroen Zandvliet (jeroen@v-web.nl)
 * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */


// No direct access to this file
defined('_JEXEC') or die('Restricted access');

use QControl\Site\Models\RaceEvent;

class ParticipationList
{

	public $name;

	/**
	 * @param RaceEvent $data
	 * 
	 * @return ParticipationList
	 */
	public static function create(RaceEvent $data): ParticipationList
	{
		$participationList = new ParticipationList($data);
		return $participationList;
	}


}