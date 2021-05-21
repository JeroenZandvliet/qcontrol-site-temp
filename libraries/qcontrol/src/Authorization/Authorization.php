<?php
namespace QControl\Site\Authorization;

use QControl\Site\Repository\AuthorizationRepository;
use Joomla\CMS\Factory;

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

			$authorizationRepository = new AuthorizationRepository();
			$this->authorizationBearer = $authorizationRepository->setAuthenticationHeader();

		} else {
			$this->authorizationBearer = null;
		}
	}	
}