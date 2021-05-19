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


$event = EventComponentHelper::getEventById(6);

$eventParticipations = EventComponentHelper::getEventParticipationsById(6);

?>
<h1> Evenement </h1>
<?php 
echo EventComponentHelper::renderEventHTML($event);
echo "Huidig aantal inschrijvingen: " . EventComponentHelper::getTotalParticipationsForEvent($eventParticipations);

