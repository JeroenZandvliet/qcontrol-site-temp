<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Joomla\CMS\Factory;

use QControl\Site\HttpApi\AuthorizationHttp;
use QControl\Site\Repository\EventRepository;

require_once dirname(__FILE__).'../../../libraries/qcontrol/include.php';
require_once dirname(__FILE__).'../../../modules/mod_qcontrol_eventmodule/helper.php';

final class EventRepositoryTest extends TestCase
{

	public function testcanGetEventList()
	{
		$stub = $this->testStub();
		$this->assertEquals('Meow', $stub->getAllEvents());
	}

	public function testStub()
	{
		$stub = $this->getMockBuilder(EventRepository::class)
			->disableOriginalConstructor()
			->disableOriginalClone()
			->disableArgumentCloning()
			->disallowMockingUnknownTypes()
			->getMock();


		$stub->method('getAllEvents')
			-> willReturn('Meow');

		$this->assertEquals('Meow', $stub->getAllEvents());
		return $stub;

	}

}