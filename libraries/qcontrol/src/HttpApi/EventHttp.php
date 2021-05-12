<?php
namespace QControl\Site\HttpApi;

// no direct access
defined('_JEXEC') or die('Restricted access');

use QControl\Site\Calls\CurlCalls;
use QControl\Site\HttpApi\HttpInterface;
use QControl\Site\Authorization\Authorization;

class EventHttp extends Authorization implements HttpInterface
{
	
	function setUpGetAllCall()
	{
		try{
			$apiLink = $this->commonApiLink."api/v1/Event/events";
			$curlCall = new CurlCalls();
			$response = $curlCall->sendGetCall($apiLink, $this->authorizationBearer);
			return $response;
		} catch(Error $error){
			echo "Error: " . $error->getMessage();
		}
	}

	function setUpGetByIdCall($id)
	{
		try{
		$apiLink = $this->commonApiLink."api/v1/Event/events/".$id;
		$curlCall = new CurlCalls();
		$response = $curlCall->sendGetCall($apiLink, $this->authorizationBearer);
		return $response;
		}
		catch(Error $error){
			echo "Error: " . $error->getMessage();
		}
	}

	function setUpPostCall($request){}
	function setUpPutCall($request){}
	function setUpDeleteCall($request){}
}
