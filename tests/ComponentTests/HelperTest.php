<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Joomla\CMS\Factory;

require_once dirname(__FILE__).'../../../libraries/qcontrol/include.php';
require_once dirname(__FILE__).'../../../components/com_qcontrol/helpers/agendahelper.php';

final class HelperTest extends TestCase
{

	public function testCanCreateAgendaHelper(){

		$this->assertInstanceOf(AgendaComponentHelper::class, new AgendaComponentHelper);
		

	}



}