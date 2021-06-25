<?php
namespace QControl\Site\HttpApi;

// no direct access
defined('_JEXEC') or die('Restricted access');

use QControl\Site\Calls\CurlCalls;
use QControl\Site\HttpApi\HttpInterface;
use QControl\Site\Authorization\Authorization;
use Joomla\CMS\Factory;

class RaceEventHttp extends Authorization implements HttpInterface
{

	private $curlCall;
	public function __construct(CurlCalls $curlCall)
	{
		$this->curlCall = $curlCall;
	}


	public function setUpGetAllCall()
	{
		try{
			$this->setAccessTokenIfNotSet();
			$apiLink = $this->commonApiLink."api/v1/Event/events/1/raceEvents/1";
			$curlCall = new CurlCalls();
			$response = $curlCall->sendGetCall($apiLink, $this->authorizationBearer);
			return $response;
		} catch (Error $error){
			echo "Error: " . $error->getMessage();
		}
	}

	public function setUpGetByIdCall($idArray)
	{	try{


			$session = Factory::getSession();

			// Clear Session Token for Testing Purposes
			$session->clear('accessToken');

		
			$this->setAccessTokenIfNotSet();

			// Check if Authorizationbearer was set
			if(!empty($this->authorizationBearer)){
				$apiLink = $this->commonApiLink."api/v1/Event/events/". $idArray[0] . "/raceEvents" . "/" . $idArray[1];
				$curlCall = new CurlCalls();
				$response = $curlCall->sendGetCall($apiLink, $this->authorizationBearer);
				return $response;
			}
		} catch(Error $error){
			echo "Error: " . $error->getMessage();
		}
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