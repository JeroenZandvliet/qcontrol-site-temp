<?php
namespace QControl\Site\Repository;

// no direct access
defined('_JEXEC') or die('Restricted access');

use QControl\Site\HttpApi\AuthorizationHttp;

class AuthorizationRepository
{

	

	public function setAuthenticationHeader(){
		$authorizationHttp = new AuthorizationHttp();
		$result = $authorizationHttp->setUpGetCurlCall();
		return $result;
	}
}
