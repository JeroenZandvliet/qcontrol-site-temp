<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_qcontrol
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');





?>
<h1> Driver </h1>
<?php 

$drivers = DriverComponentHelper::getAllDrivers();
if(is_object($drivers[0])){
	var_dump($drivers);
}

// echo ComponentHelper::renderEventHTML($event); 
