<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Joomla\CMS\Factory;


require_once dirname(__FILE__).'../../../../libraries/ApiLib/include.php';
require_once dirname(__FILE__).'../../../../components/com_qcontrol/helpers/agendahelper.php';

final class AgendaTest extends TestCase
{
	public function testCanCreateAgendaComponent(){

		$agendaHelper = new AgendaComponentHelper();







		$this->assertIsString($agendaHelper->renderAgendaHTML($testdata));

	}
}