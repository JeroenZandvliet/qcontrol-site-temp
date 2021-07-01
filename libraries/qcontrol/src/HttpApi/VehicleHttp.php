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

class VehicleHttp extends Authorization implements HttpInterface
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
	 * @return array
	 */
	public function setUpGetAllCall(): array
	{
		try{
		
			$this->setAccessTokenIfNotSet();

			// Check if Authorizationbearer was set
			if(!empty($this->authorizationBearer)){

				$apiLink = $this->commonApiLink."api/v1/Vehicle/vehicles";
				$curlCall = new CurlCalls();
				$response = $curlCall->sendGetCall($apiLink, $this->authorizationBearer);
				return $response;
			}
		} catch(Error $error){
			echo "Error: " . $error->getMessage();
		}
	}

	/**
	 * @param int $id
	 * 
	 * @return array
	 */
	public function setUpGetByIdCall(int $id): array
	{
		try
		{
			$this->setAccessTokenIfNotSet();


			// Check if Authorizationbearer was set
			if(!empty($this->authorizationBearer))
			{

				$apiLink = $this->commonApiLink."api/v1/Vehicle/vehicles/".$id;
				$curlCall = new CurlCalls();
				$response = $curlCall->sendGetCall($apiLink, $this->authorizationBearer);
				return $response;
			}
		}
			catch(Error $error){
				echo "Error: " . $error->getMessage();
			}
	}

	/**
	 * @param Vehicle $vehicle
	 * 
	 * @return array
	 */
	public function setUpPostCall($vehicle):array
	{
		try
		{
			$this->setAccessTokenIfNotSet();
			
			if(!empty($this->authorizationBearer))
			{


				
				$postData = json_encode($vehicle);

				$apiLink = $this->commonApiLink."api/v1/Vehicle/vehicles/";
				$curlCall = new CurlCalls();
				$response = $curlCall->sendPostCall($apiLink, $this->authorizationBearer, $postData);
				return $response;
			}

		} catch(Error $error){
			echo "Error: " . $error->getMessage();
		}
	}


	/**
	 * @param mixed $vehicle
	 * 
	 * @return array
	 */
	public function setUpPutCall($vehicle): array
	{
		try
		{

			$this->setAccessTokenIfNotSet();

			if(!empty($this->authorizationBearer))
			{
				
				$putData = json_encode($vehicle);

				$apiLink = $this->commonApiLink."api/v1/Vehicle/vehicles/".$vehicle['id'];
				$curlCall = new CurlCalls();
				$response = $curlCall->sendUpdateCall($apiLink, $this->authorizationBearer, $putData);
				return $response;
			}

		} catch(Error $error){
			echo "Error: " . $error->getMessage();
		}
	}


	public function setUpDeleteCall(int $vehicleId): void
	{
		try
		{

			$this->setAccessTokenIfNotSet();

			if(!empty($this->authorizationBearer))
			{
				

				$apiLink = $this->commonApiLink."api/v1/Vehicle/vehicles/".$vehicleId;

				$curlCall = new CurlCalls();
				$curlCall->sendDeleteCall($apiLink, $this->authorizationBearer);

			}

		} catch(Error $error){
			echo "Error: " . $error->getMessage();
		}
	}


}