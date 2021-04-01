<?php
namespace QControl\Site\Calls;

interface CallInterface
{
	public function sendGetCall($curlCall, $authorizationBearer);
	public function sendPostCall($curlCall, $authorizationBearer);
	public function sendUpdateCall($curlCall, $authorizationBearer);
	public function sendDeleteCall($curlCall, $authorizationBearer);

}
