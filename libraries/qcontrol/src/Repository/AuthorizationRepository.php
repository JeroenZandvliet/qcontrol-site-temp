<?php
namespace QControl\Site\Repository;

// no direct access
defined('_JEXEC') or die('Restricted access');

use QControl\Site\HttpApi\AuthorizationHttp;
use Joomla\CMS\Factory;
use QControl\Site\QControlFactory;

class AuthorizationRepository
{
	private $authorizationHttp;
	public function __construct(AuthorizationHttp $authorizationHttp)
	{
		$this->authorizationHttp = $authorizationHttp;
	}

	public function setAuthenticationHeader(){
		$authorizationHttp = QControlFactory::getAuthorizationHttp();
		$result = $authorizationHttp->setUpGetCurlCall();
		return $result;
	}


	public function checkIfAccessTokenIsSet(){
		$authorizationHttp = QControlFactory::getAuthorizationHttp();
		$result = $authorizationHttp->checkIfAccessTokenIsSet();

		return $result;
	}
}
