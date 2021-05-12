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

			curl_setopt($curl_init, CURLOPT_SSL_VERIFYHOST, false);


			curl_setopt($curl_init, CURLOPT_HTTP_CONTENT_DECODING, false);
			curl_setopt($curl_init, CURLOPT_RETURNTRANSFER, true);

			#Store response in $response
			$response = curl_exec($curl_init);

			if($response == null){
				die("Error: ". curl_error($curl_init));
			}

			#Close Curl response
			curl_close($curl_init);


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
}
