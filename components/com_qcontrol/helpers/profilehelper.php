<?php

/**
 * @package    QControl.Component
 * @author     Jeroen Zandvliet (jeroen@v-web.nl)
 * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */


require_once(JPATH_ROOT.'/libraries/qcontrol/include.php');

// no direct access
defined('_JEXEC') or die('Restricted access');

use QControl\Site\Repository\AuthorizationRepository;
use QControl\Site\Repository\DriverRepository;
use QControl\Site\Models\SimplifiedDriver;
use QControl\Site\Models\Profile;
use QControl\Site\QControlFactory;

class ProfileComponentHelper
{

	/**
	 * @return void
	 */
	public static function setAccessToken(): void
	{
		try{
			
			$authorizationRepository = QControlFactory::getAuthorizationRepository();
			$accessToken = $authorizationRepository->setAuthenticationHeader();


		} catch(Error $error){
			echo "Error caught:  " . $error->getMessage();
		}
	}

	/**
	 * @return string
	 */
	public static function checkIfAccessTokenIsSet(): string
	{

		$authorizationRepository = QControlFactory::getAuthorizationRepository();
		$result = $authorizationRepository->checkIfAccessTokenIsSet();
		return $result;

	}

	/**
	 * @param string $id
	 * 
	 * @return Profile
	 */
	public static function getDriverById(string $id): Profile
	{
		try{
			$driverRepository = QControlFactory::getDriverRepository();
			$driver = $driverRepository->getDriverById($id);
			return $driver;
		} catch(Error $error){
			echo "Error caught:  " . $error->getMessage();
		}
	}


}