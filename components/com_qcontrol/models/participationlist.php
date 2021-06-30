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

/**
 * HelloWorld Model
 *
 * @since  0.0.1
 */
class ParticipationList
{

	public $name;

	public static function create(RaceEvent $data)
	{
		$participationList = new ParticipationList($data);
		return $participationList;
	}

	private function __construct(RaceEvent $data)
	{
	

	}
}