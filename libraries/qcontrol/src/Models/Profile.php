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

class Profile{

	public $firstName;
	public $lastName;
	public $address;
	public $city;
	public $zipCode;
	public $licenseNr;
	public $email;
	public $nationality;
	public $nationalityAlpha3;
	public $phone;
	public $gender;
	public $licenseType;
	public $dateOfBirth;
	public $team;
	public $teamId;
	public $compressedId;
	public $id;


	/**
	 * @param array $new
	 * 
	 * @return [type]
	 */
	public static function createNew(array $new): Profile
	{
		$fullDriver = new Profile($new);
		return $fullDriver;
	}

	/**
	 * @param array $existing
	 * 
	 * @return Profile
	 */
	public static function fromState(array $existing): Profile
	{
		$fullDriver = new Profile($existing);
		return $fullDriver;
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
		$this->nationality = $data['nationality'];
		$this->nationalityAlpha3 = $data['nationalityAlpha3'];
		$this->phone = $data['phone'];
		$this->gender = $data['gender'];
		$this->licenseType = $data['licenseType'];
		$this->dateOfBirth = $data['dateOfBirth'];
		$this->team = $data['team'];
		$this->teamId = $data['teamId'];
		$this->compressedId = $data['compressedId'];
		$this->id = $data['id'];
	}

}