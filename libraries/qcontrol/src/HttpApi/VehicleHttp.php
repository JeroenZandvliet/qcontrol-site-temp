<?php
namespace QControl\Site\HttpApi;

// no direct access
defined('_JEXEC') or die('Restricted access');

use QControl\Site\Calls\CurlCalls;
use QControl\Site\HttpApi\HttpInterface;
use QControl\Site\Authorization\Authorization;
use Joomla\CMS\Factory;

class VehicleHttp extends Authorization implements HttpInterface
{

	public function setUpGetAllCall()
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

	public function setUpGetByIdCall($id)
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

	public function setUpPostCall($vehicle)
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

	public function setUpPutCall($vehicle)
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


	public function setUpDeleteCall($vehicleId)
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