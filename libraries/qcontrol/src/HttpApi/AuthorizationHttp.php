<?php

/**
 * @package    QControl.Library
 * @author     Jeroen Zandvliet (jeroen@v-web.nl)
 * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace QControl\Site\HttpApi;

// no direct access
defined('_JEXEC') or die('Restricted access');

use QControl\Site\Calls\CurlCalls;
use QControl\Site\Authorization\Authorization;
use QControl\Site\Repository\AuthorizationRepository;
use Joomla\CMS\Factory;

class AuthorizationHttp extends Authorization 
{

	private $curlCall;

	/**
	 * @param CurlCalls $curlCall
	 */

	public function __construct(CurlCalls $curlCall)
	{
		$this->curlCall = $curlCall;
	}

	/**
	 * @return string
	 */
	public function setUpGetCurlCall(): string
	{

		$apiLink = $this->commonApiLink . "api/v1/authenticate";

		//Get APIkey and Secret from file
		$keyData = $this->getTextFromFile();


		$curlCalls = new CurlCalls();
		$this->authorizationBearer = $curlCalls->sendAuthorizationCall($apiLink, $keyData);

		if(is_array($this->authorizationBearer))
		{
			$accessToken = $this->authorizationBearer['accessToken'];
		}
		
		return $accessToken;

	}


	/**
	 * @return void
	 */
	public function checkIfAccessTokenIsSet(): void
	{
		$session = Factory::getSession();
		$accessToken = $session->get('accessToken');

		if(empty($accessToken)){

			$authorizationRepository = new AuthorizationRepository();
			$authorizationRepository->setAuthenticationHeader();

		}

	}	


	/**
	 * @return array
	 */
	public function getTextFromFile(): array
	{
		$data = [];

		$array = explode(",", file_get_contents(realpath(__DIR__) . '/apikey.properties'));

		return $array;
	}

}