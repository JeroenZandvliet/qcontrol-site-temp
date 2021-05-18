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

		$session = Factory::getSession();
		$session->set('accessToken', $result);
	}
}
