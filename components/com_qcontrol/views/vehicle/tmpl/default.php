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




$vehicle = VehicleComponentHelper::getAllDrivers();

?>
<h1> Vehicle </h1>

<?php 
//echo VehicleComponentHelper::renderRaceEventHTML($raceEvent);
var_dump($vehicle);