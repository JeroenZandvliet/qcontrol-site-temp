<?php

/**
 * @package    QControl.Library
 * @author     Jeroen Zandvliet (jeroen@v-web.nl)
 * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

use Joomla\CMS\Factory;

class JClientFramework
{
	public static function init()
	{

		
		// Joomla requires this to run.
		
		if (!defined('_JEXEC') ) {
			define('_JEXEC', 1);
		};

		
		self::defineBasePath();
		
		require_once JPATH_BASE . '/includes/defines.php';
		require_once JPATH_BASE . '/includes/framework.php';
		
		Factory::getApplication('cli');
		

	}
	
	private static function defineBasePath()
	{
		$path = dirname(__FILE__) . '/';
		
		for ($i = 0; $i < 10; $i++) {
			if (file_exists($path . 'configuration.php')) {


				if (!defined('JPATH_BASE')) {
					define('JPATH_BASE', realpath($path));
				}

				break;
			}
			$path .= '../';
		}
		
		defined('JPATH_BASE') or die('ERROR: Unable to find Joomla base directory...');
	}

}