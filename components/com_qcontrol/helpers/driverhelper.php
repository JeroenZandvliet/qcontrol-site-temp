<?php

/**
 * @package    QControl.Component
 * @author     Jeroen Zandvliet (jeroen@v-web.nl)
 * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */


// no direct access
defined('_JEXEC') or die('Restricted access');

require_once(JPATH_ROOT.'/libraries/qcontrol/include.php');

use QControl\Site\Repository\DriverRepository;
use QControl\Site\Models\SimplifiedDriver;
use QControl\Site\QControlFactory;

class DriverComponentHelper
{
	public static function getAllDrivers()
	{
		try
		{
			$driverRepository = QControlFactory::getDriverRepository();
			$drivers = $driverRepository->getAllDrivers();
			return $drivers;
		} catch(Error $error){
			echo "Error: " . $error->getMessage();
		}
	}

	public static function renderDriverHTML(Event $event)
	{

	}
}