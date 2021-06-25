<?php
namespace QControl\Site\Authorization;

use QControl\Site\Repository\AuthorizationRepository;
use Joomla\CMS\Factory;
use QControl\Site\QControlFactory;

// no direct access
defined('_JEXEC') or die('Restricted access');

abstract class Authorization
{
	public $commonApiLink = "https://qcontrolorganisation.mk2softwaredev.nl/";
	public $authorizationBearer;

	public function setAccessTokenIfNotSet()
	{
		$session = Factory::getSession();
		$accessToken = $session->get('accessToken');


		if(empty($accessToken)){

			$authorizationRepository = QControlFactory::getAuthorizationRepository();
			$this->authorizationBearer = $authorizationRepository->setAuthenticationHeader();
			
			$session = Factory::getSession();
			$session->set('accessToken', $this->authorizationBearer);

		} else {
			$this->authorizationBearer = $accessToken;
		}
	}	
}