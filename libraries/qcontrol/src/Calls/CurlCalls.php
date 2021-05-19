<?php
namespace QControl\Site\Calls;

// no direct access
defined('_JEXEC') or die('Restricted access');

class CurlCalls implements CallInterface
{

	public $disabled;
	public $group;
	public $name;
	public $selected;
	public $text;
	public $value;


	function testCat(){
		return 5;
	}

	function sendGetCall($apiLink, $authorizationBearer): array
	{
		try{
			# Initialize Curl call
			$curl_init = curl_init($apiLink);

			# Set up the Curl request
		
			curl_setopt($curl_init, CURLOPT_HTTPHEADER, array('Authorization: bearer '.$authorizationBearer,
			));

			# Return response as array instead of Object
			curl_setopt($curl_init, CURLOPT_HTTP_CONTENT_DECODING, false);
			curl_setopt($curl_init, CURLOPT_RETURNTRANSFER, true);

			#Store response in $response
			$response = curl_exec($curl_init);

			if (curl_errno($curl_init)) {
				$error_msg = curl_error($curl_init);
			}

			#Close Curl response
			curl_close($curl_init);

			if (isset($error_msg)){
				return "The data could not be retrieved.";
			}

			# Decode array response
			$decoded = json_decode($response, true);

			# Return json_decoded variable

			return $decoded['result'];
		} catch (Error $error ) {
			echo "Error: " . $error->getMessage();
		}
	}


	public function sendPostCall($curlCall, $authorizationBearer){}
	public function sendUpdateCall($curlCall, $authorizationBearer){}
	public function sendDeleteCall($curlCall, $authorizationBearer){}

	public function sendAuthorizationCall($apiLink, $apiData){

		$apiKey = $apiData[0];
		$secret = $apiData[1];

		$postData = '{"apiKey":"'. $apiKey.'","secret":"'.$secret.'"}';

		$curl_init = curl_init($apiLink);
		curl_setopt($curl_init, CURLOPT_POST, 1);
		curl_setopt($curl_init, CURLOPT_POSTFIELDS, $postData);
		curl_setopt($curl_init, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl_init, CURLOPT_HTTP_CONTENT_DECODING, false);
		curl_setopt($curl_init, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($curl_init);

		if (curl_errno($curl_init)) {
			$error_msg = curl_error($curl_init);
		}

		curl_close($curl_init);

		if (isset($error_msg)){
			return "The data could not be retrieved."; 
		}

		$decoded = json_decode($response, true);

		return $decoded['result'];

	}
}
