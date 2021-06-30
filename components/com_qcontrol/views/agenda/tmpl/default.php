<?php

/**
 * @package    QControl.Component
 * @author     Jeroen Zandvliet (jeroen@v-web.nl)
 * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');



?>
<h1> Agenda </h1>
<?php 

$events = AgendaComponentHelper::getAllEvents();
echo AgendaComponentHelper::renderAgendaHTML($events);