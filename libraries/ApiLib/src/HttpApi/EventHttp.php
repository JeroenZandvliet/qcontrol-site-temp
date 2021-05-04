<?php
namespace QControl\Site\HttpApi;

use QControl\Site\Calls\CurlCalls;
use QControl\Site\HttpApi\HttpInterface;
use QControl\Site\Authorization\Authorization;

class EventHttp extends Authorization implements HttpInterface
{
	
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
