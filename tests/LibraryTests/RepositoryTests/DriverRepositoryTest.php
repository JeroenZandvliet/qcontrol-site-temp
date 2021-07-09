<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Joomla\CMS\Factory;

use QControl\Site\HttpApi\AuthorizationHttp;
use QControl\Site\Repository\DriverRepository;
use QControl\Site\Models\Profile;
use QControl\Site\Models\Vehicle;
use QControl\Site\Models\Participation;

require_once dirname(__FILE__).'../../../../libraries/qcontrol/include.php';


final class DriverRepositoryTest extends TestCase
{

	public function testCanGetParticipations()
	{
		$test = array("Test");
		$eventRepositoryStub = $this->testCanCreateDriverRepositoryStub();
		$this->assertContainsOnlyInstancesOf(Profile::class, $eventRepositoryStub->getAllDrivers());
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
			->willReturn(array(Profile::createNew($test), Profile::createNew($test)));

		$driverRepositoryStub->method('getDriverById')
			->willReturn(Profile::createNew($test));
		
		$driverRepositoryStub->method('getVehiclesByDriverId')
			->willReturn(Vehicle::createNew($test));

		$this->assertContainsOnlyInstancesOf(Profile::class, $driverRepositoryStub->getAllDrivers());
		return $driverRepositoryStub;

	}
}