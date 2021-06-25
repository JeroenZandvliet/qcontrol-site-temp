<?php
namespace QControl\Site\HttpApi;

// no direct access
defined('_JEXEC') or die('Restricted access');

use QControl\Site\Calls\CurlCalls;
use QControl\Site\Authorization\Authorization;
use QControl\Site\Repository\AuthorizationRepository;
use Joomla\CMS\Factory;

class AuthorizationHttp extends Authorization 
{

	
	private $curlCall;
	public function __construct(CurlCalls $curlCall)
	{
		$this->curlCall = $curlCall;
	}

	public function setUpGetCurlCall()
	{

		$apiLink = $this->commonApiLink . "api/v1/authenticate";

		//Get APIkey and Secret from file
		$keyData = $this->getTextFromFile();


		$curlCalls = new CurlCalls();
		$this->authorizationBearer = $curlCalls->sendAuthorizationCall($apiLink, $keyData);

		if(is_array($this->authorizationBearer))
		{
			$accessToken = $this->authorizationBearer['accessToken'];
		}
		
		return $accessToken;

	}


	public function checkIfAccessTokenIsSet()
	{
		$session = Factory::getSession();
		$accessToken = $session->get('accessToken');

		if(empty($accessToken)){

			$authorizationRepository = new AuthorizationRepository();
			$authorizationRepository->setAuthenticationHeader();

		}

	}	


	public function getTextFromFile(){
		$data = [];

		$array = explode(",", file_get_contents(realpath(__DIR__) . '/apikey.properties'));

		return $array;
	}

}