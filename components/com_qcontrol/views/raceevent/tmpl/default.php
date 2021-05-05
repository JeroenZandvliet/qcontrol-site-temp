<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');




$raceEvent = RaceEventComponentHelper::getRaceEventInfo(27);

?>
<h1> Race Evenement </h1>

<?php echo RaceEventComponentHelper::renderRaceEventHTML($raceEvent); ?>