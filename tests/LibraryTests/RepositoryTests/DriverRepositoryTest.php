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
		$test = array("Test");
		$eventRepositoryStub = $this->testCanCreateDriverRepositoryStub();
		$this->assertEquals(Driver::createNew($test), $eventRepositoryStub->getAllDrivers());
	}

	public function testCanCreateDriverRepositoryStub()
	{
		$test = array("Test");

		$driverRepositoryStub = $this->getMockBuilder(DriverRepository::class)
			->disableOriginalConstructor()
			->disableOriginalClone()
			->disableArgumentCloning()
			->disallowMockingUnknownTypes()
			->getMock();


		$driverRepositoryStub->method('getAllDrivers')
			->willReturn(Driver::createNew($test));

		$driverRepositoryStub->method('getDriverById')
			->willReturn(Driver::createNew($test));
		
		$driverRepositoryStub->method('getVehiclesByDriverId')
			->willReturn(Participation::createNew($test));

		$this->isArray(Driver::createNew($test), $driverRepositoryStub->getAllDrivers());
		return $driverRepositoryStub;

	}
}