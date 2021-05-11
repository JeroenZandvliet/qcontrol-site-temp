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


$profile = ProfileComponentHelper::getDriverById('d3b75118-50a2-4a6a-f238-08d83d03ea44');

?>
<h1> Profiel </h1>
<?php 
//echo ComponentHelper::renderEventHTML($event);
var_dump($profile);