<?php
namespace QControl\Site\Calls;

// no direct access
defined('_JEXEC') or die('Restricted access');

interface CallInterface
{
	public function sendGetCall($curlCall, $authorizationBearer);
	public function sendPostCall($curlCall, $authorizationBearer);
	public function sendUpdateCall($curlCall, $authorizationBearer);
	public function sendDeleteCall($curlCall, $authorizationBearer);

}
