<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<input type="number" id="eventId" name="eventId">
	<input type="submit">
</form>

<?php
/**
 * Hello World! Module Entry Point
 * 
 * @package    Joomla.Tutorials
 * @subpackage Modules
 * @license    GNU/GPL, see LICENSE.php
 * @link       http://docs.joomla.org/J3.x:Creating_a_simple_module/Developing_a_Basic_Module
 * mod_helloworld is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */

// No direct access
defined('_JEXEC') or die;
// Include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';

//$hello = modHelloWorldHelper::getAllEvents($params);
require JModuleHelper::getLayoutPath('mod_helloworld');
$hello = modHelloWorldHelper::getOneEvent(5);
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$eventId = $_POST['eventId'];
		$hello = modHelloWorldHelper::getOneEvent($params);
		echo $eventId;
	}
?>