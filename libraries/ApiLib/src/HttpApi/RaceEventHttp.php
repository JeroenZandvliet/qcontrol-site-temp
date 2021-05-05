<?php
namespace QControl\Site\HttpApi;


use QControl\Site\Calls\CurlCalls;
use QControl\Site\HttpApi\HttpInterface;
use QControl\Site\Authorization\Authorization;

class RaceEventHttp extends Authorization implements HttpInterface
{
	public function setUpGetAllCall()
	{
		$apiLink = $this->commonApiLink."api/v1/Event/events/1/raceEvents/1";
		$curlCall = new CurlCalls();
		$response = $curlCall->sendGetCall($apiLink, $this->authorizationBearer);
		return $response;
	}

	public function setUpGetByIdCall($id)
	{
		$apiLink = $this->commonApiLink."api/v1/Event/events/6/raceEvents/26";
		$curlCall = new CurlCalls();
		$response = $curlCall->sendGetCall($apiLink, $this->authorizationBearer);
		return $response;
	}

	public function setUpPostCall($request)
	{

	}

	public function setUpPutCall($request)
	{

	}

	public function setUpDeleteCall($request)
	{

	}
}