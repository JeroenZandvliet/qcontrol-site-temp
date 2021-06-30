<?php

/**
 * @package    QControl.Component
 * @author     Jeroen Zandvliet (jeroen@v-web.nl)
 * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

$idArray = [4, 15];



?>
<h1> Race Evenement </h1>


<?php 
$raceEvent = RaceEventComponentHelper::getRaceEventInfo($idArray);



if(is_object($raceEvent)){
	// var_dump($raceEvent->participations);
	echo RaceEventComponentHelper::renderRaceEventHTML($raceEvent);
	echo "<h1>Deelnemers</h1>";
	echo RaceEventComponentHelper::renderParticipationNameListHTML($raceEvent);
	// $participationList = ParticipationList::create($raceEvent);
}