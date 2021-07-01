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

class SimplifiedDriver{

	public $firstName;
	public $lastName;
	public $address;
	public $city;
	public $zipCode;
	public $licenseNr;
	public $email;
	public $compressedId;
	public $id;


	/**
	 * @param array $new
	 * 
	 * @return SimplifiedDriver
	 */
	public static function createNew(array $new): SimplifiedDriver
	{
		$simplifiedDriver = new SimplifiedDriver($new);
		return $simplifiedDriver;
	}

	/**
	 * @param array $existing
	 * 
	 * @return SimplifiedDriver
	 */
	public static function fromState(array $existing): SimplifiedDriver
	{
		$simplifiedDriver = new SimplifiedDriver($existing);
		return $simplifiedDriver;
	}
	 
	private function __construct(array $data)
	{
		$this->firstName = $data['firstName'];
		$this->lastName = $data['lastName'];
		$this->address = $data['address'];
		$this->city = $data['city'];
		$this->zipCode = $data['zipCode'];
		$this->licenseNr = $data['licenseNr'];
		$this->email = $data['email'];
		$this->compressedId = $data['compressedId'];
		$this->id = $data['id'];
	}

}