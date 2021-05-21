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
<h1> Evenement </h1>
<?php 

$event = EventComponentHelper::getEventById(6);

if(!empty($event)){
	$eventParticipations = EventComponentHelper::getEventParticipationsById(6);
	echo EventComponentHelper::renderEventHTML($event);
	echo "Huidig aantal inschrijvingen: " . EventComponentHelper::getTotalParticipationsForEvent($eventParticipations);
}

