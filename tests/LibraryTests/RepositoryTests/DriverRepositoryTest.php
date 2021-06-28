<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Joomla\CMS\Factory;

use QControl\Site\HttpApi\AuthorizationHttp;
use QControl\Site\Repository\DriverRepository;
use QControl\Site\Models\Driver;
use QControl\Site\Models\SimplifiedDriver;
use QControl\Site\Models\Participation;

require_once dirname(__FILE__).'../../../../libraries/qcontrol/include.php';


final class DriverRepositoryTest extends TestCase
{

	

	public function testCanGetParticipations()
	{
		$eventRepositoryStub = $this->testCanCreateDriverRepositoryStub();
		$this->assertEquals(Driver::class, $eventRepositoryStub->getAllDrivers());
	}


	public function testCanCreateDriverRepositoryStub()
	{
		$driverRepositoryStub = $this->getMockBuilder(DriverRepository::class)
			->disableOriginalConstructor()
			->disableOriginalClone()
			->disableArgumentCloning()
			->disallowMockingUnknownTypes()
			->getMock();


		$driverRepositoryStub->method('getAllDrivers')
			->willReturn(Driver::class);

		$driverRepositoryStub->method('getDriverById')
			->willReturn(Driver::class);
		
		$driverRepositoryStub->method('getVehiclesByDriverId')
			->willReturn(Participation::class);

		$this->assertEquals(Driver::class, $driverRepositoryStub->getAllDrivers());
		return $driverRepositoryStub;

	}
}