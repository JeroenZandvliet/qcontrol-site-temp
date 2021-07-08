<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Joomla\CMS\Factory;

use QControl\Site\HttpApi\AuthorizationHttp;
use QControl\Site\Models\Event;

require_once dirname(__FILE__).'../../../../libraries/qcontrol/include.php';


final class EventModelTest extends TestCase
{

	public function testCanCreateNewEventModel()
	{

		//Arrange
		$testdata = '{
			"name": "Test",
			"description": "Test",
			"location": "Test",
			"date": "2020-12-31T00:00:00",
			"registrationDeadline": "2020-08-30T12:25:00",
			"chiefScrutineer": "Test",
			"raceDirector": "Test",
			"steward": "Test",
			"secretary": "Test",
			"visible": false,
			"physicalBriefing": true,
			"eventRaceClasses": [
				{
					"raceClass": {
						"name": "Test",
						"id": 5
					}
				}
			],
			"raceEvents": [
				{
					"title": "Test",
					"date": "2020-12-31T12:00:00",
					"id": 20
				}
			],
			"id": 6
		}';


		//Act
		$testdata = json_decode($testdata, true);
		$eventObject = Event::createNew($testdata);

		//Assert
		$this->assertInstanceOf(Event::class, $eventObject);

	}


}