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
use QControl\Site\HttpApi\HttpInterface;
use QControl\Site\Authorization\Authorization;
use QControl\Site\Repository\AuthorizationRepository;
use Joomla\CMS\Factory;

class DriverHttp extends Authorization implements HttpInterface
{
	private $curlCall;
	/**
	 * @param CurlCalls $curlCall
	 */
	public function __construct(CurlCalls $curlCall)
	{
		$this->curlCall = $curlCall;
	}

	public function setUpGetAllCall(): array
	{
		try{

			$session = Factory::getSession();

			// Clear Session Token for Testing Purposes
			$session->clear('accessToken');


			$this->setAccessTokenIfNotSet();

			if(!empty($this->authorizationBearer)){
				$apiLink = $this->commonApiLink."api/v1/Driver/drivers";
				$curlCall = new CurlCalls();
				$response = $curlCall->sendGetCall($apiLink, $this->authorizationBearer);
				return $response;
			}

		} catch(Error $error){
			echo "Error: " . $error->getMessage();
		}
	}

	public function setUpGetByIdCall($id): array
	{
		try{
			$session = Factory::getSession();

			// Clear Session Token for Testing Purposes
			$session->clear('accessToken');

			$this->setAccessTokenIfNotSet();

			if(!empty($this->authorizationBearer)){
				$apiLink = $this->commonApiLink."api/v1/Driver/drivers/".$id;
				$curlCall = new CurlCalls();
				$response = $curlCall->sendGetCall($apiLink, $this->authorizationBearer);
				return $response;
				}
			}
			catch(Error $error){
				echo "Error: " . $error->getMessage();
			}
	}

	public function setUpPostCall($request){}
	public function setUpPutCall($request){}
	public function setUpDeleteCall(int $id){}
	

}