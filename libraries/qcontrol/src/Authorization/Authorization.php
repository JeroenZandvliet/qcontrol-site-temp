<?php

/**
 * @package    QControl.Library
 * @author     Jeroen Zandvliet (jeroen@v-web.nl)
 * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

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