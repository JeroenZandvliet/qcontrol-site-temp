<?php 
// No direct access
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Uri\Uri;

$document = Factory::getDocument();
$document->addStylesheet(Uri::root()."modules/mod_eventmodule/tmpl/eventModuleStyleSheet.css");


$events = ModEventModuleHelper::getAllEvents();
?>

<table style="width:100%">
	<tr>
		<th>Name</th>
		<th>Description</th>
		<th>Date</th>
	</tr>
	<?php echo ModEventModuleHelper::renderAllEventHTML($events);?>

</table>