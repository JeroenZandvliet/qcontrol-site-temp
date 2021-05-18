<?php
namespace QControl\Site\HttpApi;

// no direct access
defined('_JEXEC') or die('Restricted access');

use QControl\Site\Calls\CurlCalls;
use QControl\Site\Authorization\Authorization;

class AuthorizationHttp extends Authorization {
	
		public function setUpGetCurlCall(){

			$apiLink = $this->commonApiLink . "api/v1/authenticate";

			$keyData = $this->getTextFromFile();

			$curlCalls = new CurlCalls();

			$this->authorizationBearer = $curlCalls->sendAuthorizationCall($apiLink, $keyData);

			$result = $this->authorizationBearer['accessToken'];

			return $result;

	}


	public function getTextFromFile(){
		$data = [];

		$array = explode(",", file_get_contents('apikey.properties'));

		return $array;
	}

}