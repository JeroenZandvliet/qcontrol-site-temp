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
<h1> Profiel </h1>
<?php 
//echo ComponentHelper::renderEventHTML($event);
$profile = ProfileComponentHelper::getDriverById('d3b75118-50a2-4a6a-f238-08d83d03ea44');

if(!empty($profile)){
	var_dump($profile);
}