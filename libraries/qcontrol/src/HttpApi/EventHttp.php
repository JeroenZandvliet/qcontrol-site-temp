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
use Joomla\CMS\Factory;

class EventHttp extends Authorization implements HttpInterface
{
	private $curlCall;

	public function __construct(CurlCalls $curlCall)
	{
		$this->curlCall = $curlCall;
	}
	
	function setUpGetAllCall()
	{
		try{

			$this->setAccessTokenIfNotSet();

			if(!empty($this->authorizationBearer)){
				$apiLink = $this->commonApiLink."api/v1/Event/events";
				$curlCall = new CurlCalls();
				$response = $curlCall->sendGetCall($apiLink, $this->authorizationBearer);
				return $response;
			}
			
		} catch(Error $error){
			echo "Error: " . $error->getMessage();
		}
	}

	function setUpGetByIdCall($id)
	{
		try{

			$this->setAccessTokenIfNotSet();


			if(!empty($this->authorizationBearer)){

				$apiLink = $this->commonApiLink."api/v1/Event/events/".$id;
				$curlCall = new CurlCalls();
				$response = $curlCall->sendGetCall($apiLink, $this->authorizationBearer);
				return $response;
			}
		}
		catch(Error $error){
			echo "Error: " . $error->getMessage();
		}
	}

	function setUpPostCall($request){}
	function setUpPutCall($request){}
	function setUpDeleteCall($request){}

}
