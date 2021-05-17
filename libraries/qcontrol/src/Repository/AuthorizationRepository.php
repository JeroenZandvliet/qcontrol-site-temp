<?php
namespace QControl\Site\Repository;

// no direct access
defined('_JEXEC') or die('Restricted access');

use QControl\Site\HttpApi\AuthorizationHttp;

class AuthorizationRepository
{
	public function getTextFromFile(){
		$data = [];

		$array = explode("\n", file_get_contents('apikey.properties'));

		foreach($array as $item) {
			
			array_push($data, explode(",", $item));

		}
		return $data;
	}
	

	public function setAuthenticationHeader(){
		$authorizationHttp = new AuthorizationHttp();
	}
}
