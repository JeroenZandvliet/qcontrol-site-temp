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
		$testdata = ('{
			"name": "haico event",
			"description": "<p>24Hrs of schoorl<br></p><table class=\"table table-bordered\"><tbody><tr><td>klasse 0<br></td><td><br></td></tr><tr><td>klasse 1<br></td><td><br></td></tr><tr><td><p>klasse 2</p></td><td><br></td></tr></tbody></table>",
			"location": "Schoorl",
			"date": "2020-12-31T00:00:00",
			"registrationDeadline": "2020-08-30T12:25:00",
			"chiefScrutineer": "marcel",
			"raceDirector": "michel",
			"steward": "bart",
			"secretary": "don",
			"visible": false,
			"physicalBriefing": true,
			"eventRaceClasses": [
				{
					"raceClass": {
						"name": "Masters Historic Sports Cars",
						"id": 5
					}
				}
			],
			"raceEvents": [
				{
					"title": "24 hr race",
					"date": "2020-12-31T12:00:00",
					"id": 20
				},
				{
					"title": "567567",
					"date": "2021-01-06T15:14:00",
					"id": 24
				},
				{
					"title": "test",
					"date": "2021-01-06T20:58:00",
					"id": 26
				},
				{
					"title": "Nr 1 ",
					"date": "2021-01-06T21:06:00",
					"id": 27
				},
				{
					"title": "2 race",
					"date": "2021-01-06T21:06:00",
					"id": 28
				}
			],
			"id": 6
		}');

		//Act
		$testdata = json_decode($testdata, true);
		$eventObject = Event::createNew($testdata);

		//Assert
		$this->assertInstanceOf(Event::class, $eventObject);

	}


}