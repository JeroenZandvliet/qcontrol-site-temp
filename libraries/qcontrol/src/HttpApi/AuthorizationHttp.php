<?php
namespace QControl\Site\HttpApi;

// no direct access
defined('_JEXEC') or die('Restricted access');

use QControl\Site\Calls\CurlCalls;
use QControl\Site\Authorization\Authorization;

class AuthorizationHttp extends Authorization {
	
		public function setUpGetCurlCall(){


			$apiLink = "https://qcontrolorganisation.mk2softwaredev.nl/api/v1/authenticate";
//			$apiKey = $this->getTextFromFile()[0][1];
//			$secret = $this->getTextFromFile()[1][1];

			$keyData = json_encode($this->getTextFromFile());

			$curlCalls = new CurlCalls();



			$this->authorizationBearer = $curlCalls->sendAuthorizationCall($apiLink, $keyData);

			var_dump(($this->getTextFromFile()));

			$result = $this->authorizationBearer['accessToken'];
			return $result;

	}


	public function getTextFromFile(){
		$data = [];

		$array = explode("\n", file_get_contents('apikey.properties'));

		foreach($array as $item) {
			
			array_push($data, $item);

		}
		return $data;
	}

}