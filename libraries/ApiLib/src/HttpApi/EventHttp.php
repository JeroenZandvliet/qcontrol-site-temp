<?php
namespace QControl\Site\HttpApi;


use QControl\Site\Calls\CurlCalls;
use QControl\Site\HttpApi\HttpInterface;

class EventHttp implements HttpInterface
{
	private $commonApiLink = "https://qcontrolorganisation.mk2softwaredev.nl/";
	private $authorizationBearer = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy93cy8yMDA1LzA1L2lkZW50aXR5L2NsYWltcy9uYW1laWRlbnRpZmllciI6IjQiLCJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy93cy8yMDA1LzA1L2lkZW50aXR5L2NsYWltcy9uYW1lIjoiOHhHWFZVMFYwZkYyYnN0bkZyVDI3Nm1YMDl3N3ZicWpObzg1M2dXUyIsImh0dHA6Ly9zY2hlbWFzLnhtbHNvYXAub3JnL3dzLzIwMDUvMDUvaWRlbnRpdHkvY2xhaW1zL2VtYWlsYWRkcmVzcyI6Ijh4R1hWVTBWMGZGMmJzdG5GclQyNzZtWDA5dzd2YnFqTm84NTNnV1NAcWNvbnRyb2wuY29tIiwiQXNwTmV0LklkZW50aXR5LlNlY3VyaXR5U3RhbXAiOiI2UE9CUUhHUTdFUDQzSDRESlhGS1kyNVAzU0xCV0ROQiIsImh0dHA6Ly9zY2hlbWFzLm1pY3Jvc29mdC5jb20vd3MvMjAwOC8wNi9pZGVudGl0eS9jbGFpbXMvcm9sZSI6IkFQSSIsImh0dHA6Ly93d3cuYXNwbmV0Ym9pbGVycGxhdGUuY29tL2lkZW50aXR5L2NsYWltcy90ZW5hbnRJZCI6IjEiLCJzdWIiOiI0IiwianRpIjoiODBmMGFjZGQtNTIyYi00NzU0LTljZWUtOTY5M2E5NThlNmE2IiwiaWF0IjoxNjE3MTEzMjg3LCJuYmYiOjE2MTcxMTMyODcsImV4cCI6MTYyMTAwMTI4NywiaXNzIjoiUUNvbnRyb2wiLCJhdWQiOiJRQ29udHJvbCJ9._FoXEkTvfDVR8_2Cb6XiKY0iv3lgj5bKPK4JZYquFFE";

	function setUpGetAllCall()
	{
		$apiLink = $this->commonApiLink."api/v1/Event/events";
		$curlCall = new CurlCalls();
		$response = $curlCall->sendGetCall($apiLink, $this->authorizationBearer);
		return $response;
	}

	function setUpGetByIdCall($id)
	{
		$apiLink = $this->commonApiLink."api/v1/Event/events/".$id;
		$curlCall = new CurlCalls();
		$response = $curlCall->sendGetCall($apiLink, $this->authorizationBearer);
		return $response;
	}

	function setUpPostCall($request){}
	function setUpPutCall($request){}
	function setUpDeleteCall($request){}
}
