<?php
namespace QControl\Site\Repository;

// no direct access
defined('_JEXEC') or die('Restricted access');

use QControl\Site\HttpApi\AuthorizationHttp;
use Joomla\CMS\Factory;

class AuthorizationRepository
{

	public function setAuthenticationHeader(){
		$authorizationHttp = new AuthorizationHttp();
		$result = $authorizationHttp->setUpGetCurlCall();
		return $result;
	}


	public function checkIfAccessTokenIsSet(){
		$authorizationHttp = new AuthorizationHttp();
		$result = $authorizationHttp->checkIfAccessTokenIsSet();

		return $result;
	}
}
