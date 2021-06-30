<?php

/**
 * @package    QControl.Library
 * @author     Jeroen Zandvliet (jeroen@v-web.nl)
 * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace QControl\Site\Calls;

use Exception;

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


	function sendGetCall($apiLink, $authorizationBearer)
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
				throw new Exception("The object(s) you are trying to retrieve could not be retrieved.<br>");
			}

			# Decode array response
			$decoded = json_decode($response, true);

			# Return json_decoded variable
			return $decoded['result'];

		} catch (Error $error ) {
			return "Error: " . $error->getMessage();
		} catch (Exception $e ) {
			echo $e->getMessage();
			return null;
		}
	}

	public function sendPostCall($curlCall, $authorizationBearer, $postData)
	{

		try{
	
			$curl_init = curl_init($curlCall);
			curl_setopt($curl_init, CURLOPT_POST, 1);
			curl_setopt($curl_init, CURLOPT_POSTFIELDS, $postData);
			curl_setopt($curl_init, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			
			curl_setopt($curl_init, CURLOPT_HTTPHEADER, array('Authorization: bearer '.$authorizationBearer));
			curl_setopt($curl_init, CURLOPT_HTTP_CONTENT_DECODING, false);
			curl_setopt($curl_init, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($curl_init);

			if (curl_errno($curl_init)) {
				$error_msg = curl_error($curl_init);
			}

			curl_close($curl_init);

			if (isset($error_msg)){
				echo $error_msg;
				throw new Exception("There was an error with the database.<br>");
			}
			

		} catch (Error $error ) {
			return "Error: " . $error->getMessage();
		} catch (Exception $e ) {
			echo $e->getMessage();
			return null;
		}

	}


	public function sendUpdateCall($curlCall, $authorizationBearer, $putData)
	{

		try 
		{ 
			
			$curl_init = curl_init($curlCall);

			curl_setopt($curl_init, CURLOPT_URL, $curlCall);
			curl_setopt($curl_init, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: bearer '.$authorizationBearer, 'Content-Length: ' . strlen($putData)));
			curl_setopt($curl_init, CURLOPT_CUSTOMREQUEST, 'PUT');
			curl_setopt($curl_init, CURLOPT_POSTFIELDS,$putData);
			curl_setopt($curl_init, CURLOPT_HTTP_CONTENT_DECODING, false);
			curl_setopt($curl_init, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($curl_init);



			if (curl_errno($curl_init)) {
				$error_msg = curl_error($curl_init);
			}

			curl_close($curl_init);

			if (isset($error_msg)){
				throw new Exception("There was an error with the database.<br>");
			}

			$decoded = json_decode($response, true);

			return $decoded;

		}  catch (Exception $e ) {
			echo $e->getMessage();
			return null;
		} 


	}

	public function sendDeleteCall($curlCall, $authorizationBearer)
	{

		try 
		{ 
			
			$curl_init = curl_init($curlCall);

			curl_setopt($curl_init, CURLOPT_URL, $curlCall);
			curl_setopt($curl_init, CURLOPT_HTTPHEADER, array('Authorization: bearer '.$authorizationBearer));

			curl_setopt($curl_init, CURLOPT_CUSTOMREQUEST, "DELETE");
			
			curl_setopt($curl_init, CURLOPT_HTTP_CONTENT_DECODING, false);
			curl_setopt($curl_init, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($curl_init);

			if (curl_errno($curl_init)) {
				$error_msg = curl_error($curl_init);
			}

			curl_close($curl_init);

			if (isset($error_msg)){
				throw new Exception("There was an error with the database.<br>");
			}

			$decoded = json_decode($response, true);


			return $decoded;

		}  catch (Exception $e ) {
			echo $e->getMessage();
			return null;
		} 

	}
	

	public function sendAuthorizationCall($apiLink, $apiData){
		try { 
			$apiKey = $apiData[0];
			$secret = $apiData[1];

			$postData = '{"apiKey":"'.$apiKey.'","secret":"'.$secret.'"}';

			$curl_init = curl_init($apiLink);
			curl_setopt($curl_init, CURLOPT_POST, "PUT");
			curl_setopt($curl_init, CURLOPT_POSTFIELDS,$postData);
			curl_setopt($curl_init, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($curl_init, CURLOPT_HTTP_CONTENT_DECODING, false);
			curl_setopt($curl_init, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($curl_init);

			if (curl_errno($curl_init)) {
				$error_msg = curl_error($curl_init);
			}

			curl_close($curl_init);

			if (isset($error_msg)){
				throw new Exception("The server failed to verify the login attempt.<br>");
			}

			$decoded = json_decode($response, true);

			return $decoded['result'];

		}  catch (Exception $e ) {
			echo $e->getMessage();
			return null;
		} 

	}
}
