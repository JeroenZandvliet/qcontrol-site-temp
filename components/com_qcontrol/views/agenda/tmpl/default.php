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

$events = AgendaComponentHelper::getAllEvents();

?>
<h1> Agenda </h1>
<?php echo AgendaComponentHelper::renderAgendaHTML($events);

echo $_COOKIE['accessToken'];