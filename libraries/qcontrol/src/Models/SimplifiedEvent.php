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

class SimplifiedEvent{

	public $name;
	public $description;
	public $location;
	public $date;
	public $visible;
	public $id;


	public static function createNew(array $new)
	{
		$event = new SimplifiedEvent($new);
		return $event;
	}

	public static function fromState(array $existing): self
	{
		$event = new SimplifiedEvent($existing);
		return $event;
	}

	private function __construct(array $data)
	{

		$this->name = $data['name'];
		$this->description = $data['description'];
		$this->location = $data['location'];
		$this->date = $data['date'];
		$this->visible = $data['visible'];
		$this->id = $data['id'];

	}
}