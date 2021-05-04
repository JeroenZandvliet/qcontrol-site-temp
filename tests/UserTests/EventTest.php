<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Joomla\CMS\Factory;


require_once dirname(__FILE__).'../../../libraries/ApiLib/include.php';

use QControl\Site\Calls\CurlCalls;
use QControl\Site\HttpApi\EventHttp;
use QControl\Site\Repository\EventRepository;



final class EventTest extends TestCase
{
	private $curlCalls;



	public function testCanCreateCurlCallClass(): void
	{
        $this->assertInstanceOf(CurlCalls::class, new CurlCalls);
	}

	
	public function testCanCreateEventHttpClass(): void
	{
		$this->assertInstanceOf(EventHttp::class, new EventHttp);
	}
	
	
	public function testCanCreateEventRepository(): void
	{
		$this->assertInstanceOf(EventRepository::class, new EventRepository);
	}


	public function testCurlCallReturnsObject(): void{

		$apiLink = "https://qcontrolorganisation.mk2softwaredev.nl/api/v1/Event/events";
		$authorizationBearer = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy93cy8yMDA1LzA1L2lkZW50aXR5L2NsYWltcy9uYW1laWRlbnRpZmllciI6IjQiLCJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy93cy8yMDA1LzA1L2lkZW50aXR5L2NsYWltcy9uYW1lIjoiOHhHWFZVMFYwZkYyYnN0bkZyVDI3Nm1YMDl3N3ZicWpObzg1M2dXUyIsImh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3dzLzIwMDUvMDUvaWRlbnRpdHkvY2xhaW1zL2VtYWlsYWRkcmVzcyI6Ijh4R1hWVTBWMGZGMmJzdG5GclQyNzZtWDA5dzd2YnFqTm84NTNnV1NAcWNvbnRyb2wuY29tIiwiQXNwTmV0LklkZW50aXR5LlNlY3VyaXR5U3RhbXAiOiI2UE9CUUhHUTdFUDQzSDRESlhGS1kyNVAzU0xCV0ROQiIsImh0dHA6Ly9zY2hlbWFzLm1pY3Jvc29mdC5jb20vd3MvMjAwOC8wNi9pZGVudGl0eS9jbGFpbXMvcm9sZSI6IkFQSSIsImh0dHA6Ly93d3cuYXNwbmV0Ym9pbGVycGxhdGUuY29tL2lkZW50aXR5L2NsYWltcy90ZW5hbnRJZCI6IjEiLCJzdWIiOiI0IiwianRpIjoiODBmMGFjZGQtNTIyYi00NzU0LTljZWUtOTY5M2E5NThlNmE2IiwiaWF0IjoxNjE3MTEzMjg3LCJuYmYiOjE2MTcxMTMyODcsImV4cCI6MTYyMTAwMTI4NywiaXNzIjoiUUNvbnRyb2wiLCJhdWQiOiJRQ29udHJvbCJ9._FoXEkTvfDVR8_2Cb6XiKY0iv3lgj5bKPK4JZYquFFE";
		$curlCalls = new CurlCalls();

		$response = $curlCalls->sendGetCall($apiLink, $authorizationBearer);
		$this->assertIsArray($response);


	}




}
