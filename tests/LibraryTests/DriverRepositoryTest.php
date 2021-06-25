<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Joomla\CMS\Factory;

use QControl\Site\HttpApi\AuthorizationHttp;
use QControl\Site\Repository\DriverRepository;
use QControl\Site\Models\Driver;
use QControl\Site\Models\SimplifiedDriver;
use QControl\Site\Models\Participation;

require_once dirname(__FILE__).'../../../libraries/qcontrol/include.php';


final class DriverRepositoryTest extends TestCase
{

	
	
	public function testCanCreateDriverRepositoryStub()
	{
		$eventRepositoryStub = $this->getMockBuilder(DriverRepository::class)
			->disableOriginalConstructor()
			->disableOriginalClone()
			->disableArgumentCloning()
			->disallowMockingUnknownTypes()
			->getMock();


		$eventRepositoryStub->method('getAllEvents')
			->willReturn(Event::class);

		$eventRepositoryStub->method('getEventById')
			->willReturn(Event::class);
		
		$eventRepositoryStub->method('getEventParticipationsById')
			->willReturn(Participation::class);

		$eventRepositoryStub->method('getRaceEventById')
			->willReturn(RaceEvent::class);

		$this->assertEquals(Event::class, $eventRepositoryStub->getAllEvents());
		return $eventRepositoryStub;

	}
}