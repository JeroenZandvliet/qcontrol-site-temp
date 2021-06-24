<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Joomla\CMS\Factory;

use QControl\Site\HttpApi\AuthorizationHttp;
use QControl\Site\Repository\EventRepository;
use QControl\Site\Models\Event;
use QControl\Site\Models\Participation;

require_once dirname(__FILE__).'../../../libraries/qcontrol/include.php';


final class EventRepositoryTest extends TestCase
{

	public function testcanGetEventList()
	{
		$eventRepositoryStub = $this->testCanCreateEventRepositoryStub();
		$this->assertEquals(Event::class, $eventRepositoryStub->getAllEvents());
	}



	public function testCanGetParticipations()
	{
		$eventRepositoryStub = $this->testCanCreateEventRepositoryStub();
		$this->assertEquals(Event::class, $eventRepositoryStub->getAllEvents());
	}

	
	public function testCanCreateEventRepositoryStub()
	{
		$eventRepositoryStub = $this->getMockBuilder(EventRepository::class)
			->disableOriginalConstructor()
			->disableOriginalClone()
			->disableArgumentCloning()
			->disallowMockingUnknownTypes()
			->getMock();


		$eventRepositoryStub->method('getAllEvents')
			->willReturn(Event::class);
		
		$eventRepositoryStub->method('getEventParticipationsById')
			->willReturn(Participation::class);

		$this->assertEquals(Event::class, $eventRepositoryStub->getAllEvents());
		return $eventRepositoryStub;

	}
}