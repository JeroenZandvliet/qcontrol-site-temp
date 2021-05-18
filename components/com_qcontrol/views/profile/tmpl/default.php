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

$cookie_name = "accessToken";
$cookie_value = ProfileComponentHelper::getAccessToken();

//setcookie($cookie_name, $cookie_value, time() + 86400, "/");

$profile = ProfileComponentHelper::getDriverById('d3b75118-50a2-4a6a-f238-08d83d03ea44');

?>
<h1> Profiel </h1>
<?php 
//echo ComponentHelper::renderEventHTML($event);

if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
}

var_dump($profile);