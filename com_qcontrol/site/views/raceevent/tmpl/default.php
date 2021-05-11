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


$idArray = [4, 15];

$raceEvent = RaceEventComponentHelper::getRaceEventInfo($idArray);

?>
<h1> Race Evenement </h1>


<?php 
// var_dump($raceEvent->participations);
echo RaceEventComponentHelper::renderRaceEventHTML($raceEvent);
echo "<h1>Deelnemers</h1>";
echo RaceEventComponentHelper::renderParticipationNameListHTML($raceEvent);
// $participationList = ParticipationList::create($raceEvent);