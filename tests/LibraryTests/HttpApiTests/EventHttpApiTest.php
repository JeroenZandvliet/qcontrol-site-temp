<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Joomla\CMS\Factory;

use QControl\Site\HttpApi\AuthorizationHttp;
use QControl\Site\Repository\EventRepository;
use QControl\Site\Models\RaceEvent;
use QControl\Site\Models\Event;
use QControl\Site\Models\Participation;

require_once dirname(__FILE__).'../../../../libraries/qcontrol/include.php';


final class EventHttpApiTest extends TestCase
{
	public function testCanCreateEventHttpApiStub()
	{	
		$test = array("Test");



		$eventRepositoryStub = $this->getMockBuilder(EventRepository::class)
			->disableOriginalConstructor()
			->disableOriginalClone()
			->disableArgumentCloning()
			->disallowMockingUnknownTypes()
			->getMock();


		$eventRepositoryStub->method('getAllEvents')
			->willReturn(array(Event::createNew($test), Event::createnew($test)));

		$eventRepositoryStub->method('getEventById')
			->willReturn(Event::createNew($test));
		
		$eventRepositoryStub->method('getEventParticipationsById')
			->willReturn(array(Participation::createNew($test), Participation::createNew($test)));

		$eventRepositoryStub->method('getRaceEventById')
			->willReturn(RaceEvent::createNew($test));

		$this->assertIsArray($eventRepositoryStub->getAllEvents());
		return $eventRepositoryStub;

	}
}