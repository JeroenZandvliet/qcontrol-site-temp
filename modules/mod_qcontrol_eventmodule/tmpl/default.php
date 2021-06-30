<?php

/**
 * @package    QControl.Module
 * @author     Jeroen Zandvliet (jeroen@v-web.nl)
 * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */ 

// No direct access
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Language\Text;

$document = Factory::getDocument();
$document->addStyleSheet(Uri::root()."modules/mod_qcontrol_eventmodule/tmpl/mod_qcontrol_eventModuleStyleSheet.css");


$events = ModEventModuleHelper::getAllEvents();
?>

<table style="width:100%">
	<tr>
		<th><?php echo Text::_('MOD_QCONTROL_EVENTMODULE_NAME');?></th>
		<th><?php echo Text::_('MOD_QCONTROL_EVENTMODULE_DESCRIPTION');?></th>
		<th><?php echo Text::_('MOD_QCONTROL_EVENTMODULE_DATE');?></th>
	</tr>
	<?php echo ModEventModuleHelper::renderAllEventHTML($events);?>

</table>