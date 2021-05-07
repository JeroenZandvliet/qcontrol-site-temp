<?php
namespace QControl\Site\HttpApi;

use QControl\Site\Calls\CurlCalls;
use QControl\Site\HttpApi\HttpInterface;
use QControl\Site\Authorization\Authorization;

class VehicleHttp extends Authorization implements HttpInterface
{

	public function setUpGetAllCall()
	{
		try{
			$apiLink = $this->commonApiLink."api/v1/Driver/drivers";
			$curlCall = new CurlCalls();
			$response = $curlCall->sendGetCall($apiLink, $this->authorizationBearer);
			return $response;
		} catch(Error $error){
			echo "Error: " . $error->getMessage();
		}
	}

	public function setUpGetByIdCall($id)
	{
		try
		{
			$apiLink = $this->commonApiLink."api/v1/Driver/drivers/".$id;
			$curlCall = new CurlCalls();
			$response = $curlCall->sendGetCall($apiLink, $this->authorizationBearer);
			return $response;
		}
			catch(Error $error){
				echo "Error: " . $error->getMessage();
			}
	}

	public function setUpPostCall($request){}
	public function setUpPutCall($request){}
	public function setUpDeleteCall($request){}

}