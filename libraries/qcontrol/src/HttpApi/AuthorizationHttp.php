<?php
namespace QControl\Site\HttpApi;

// no direct access
defined('_JEXEC') or die('Restricted access');

use QControl\Site\Calls\CurlCalls;


class DriverHttp extends Authorization implements HttpInterface {
	
	$curlCalls = new CurlCalls();
	$curlCalls->sendAuthorizationCall();
}