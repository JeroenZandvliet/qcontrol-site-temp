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
use Joomla\CMS\Factory;
require_once dirname(__FILE__) . '/helpers/agendahelper.php';
require_once dirname(__FILE__) . '/helpers/eventhelper.php';
require_once dirname(__FILE__) . '/helpers/raceeventhelper.php';
require_once dirname(__FILE__) . '/helpers/driverhelper.php';
require_once dirname(__FILE__) . '/helpers/profilehelper.php';
require_once dirname(__FILE__) . '/helpers/vehiclehelper.php';
require_once dirname(__FILE__) . '/models/participationlist.php';

$document = Factory::getDocument();
$document->addStylesheet("./components/com_qcontrol/views/agenda/tmpl/com_agenda.css");

// Get an instance of the controller prefixed by HelloWorld
$controller = JControllerLegacy::getInstance('Qcontrol');

// Perform the Request task
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task'));

// Redirect if set by the controller
$controller->redirect();