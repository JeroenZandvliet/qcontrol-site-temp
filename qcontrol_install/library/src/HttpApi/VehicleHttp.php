<?php
namespace QControl\Site\HttpApi;

// no direct access
defined('_JEXEC') or die('Restricted access');

use QControl\Site\Calls\CurlCalls;
use QControl\Site\HttpApi\HttpInterface;
use QControl\Site\Authorization\Authorization;

class VehicleHttp extends Authorization implements HttpInterface
{

	public function setUpGetAllCall()
	{
		try{
			$this->setAccessTokenIfNotSet();
			$apiLink = $this->commonApiLink."api/v1/Vehicle/vehicles";
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
			$this->setAccessTokenIfNotSet();
			$apiLink = $this->commonApiLink."api/v1/Vehicle/vehicles/".$id;
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