<?php

/**
 * @package    QControl.Library
 * @author     Jeroen Zandvliet (jeroen@v-web.nl)
 * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace QControl\Site\Repository;

// no direct access
defined('_JEXEC') or die('Restricted access');

use QControl\Site\HttpApi\AuthorizationHttp;
use Joomla\CMS\Factory;
use QControl\Site\QControlFactory;

class AuthorizationRepository
{
	private $authorizationHttp;
	/**
	 * @param AuthorizationHttp $authorizationHttp
	 */
	public function __construct(AuthorizationHttp $authorizationHttp)
	{
		$this->authorizationHttp = $authorizationHttp;
	}

	/**
	 * @return string
	 */
	public function setAuthenticationHeader(): string
	{
		$authorizationHttp = QControlFactory::getAuthorizationHttp();
		$result = $authorizationHttp->setUpGetCurlCall();
		return $result;
	}


	/**
	 * @return void
	 */
	public function checkIfAccessTokenIsSet(): void
	{
		$authorizationHttp = QControlFactory::getAuthorizationHttp();
		$result = $authorizationHttp->checkIfAccessTokenIsSet();
	}
}
