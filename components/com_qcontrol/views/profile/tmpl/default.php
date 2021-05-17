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

$apiKey = ProfileComponentHelper::getApiKey()[0][1];
$secret = ProfileComponentHelper::getApiKey()[1][1];

?>
<h1> Profiel </h1>
<?php 
//echo ComponentHelper::renderEventHTML($event);


echo $apiKey . "<br>";
echo $secret;
var_dump($profile);