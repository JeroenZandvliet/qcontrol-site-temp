<?php
namespace QControl\Site\Calls;

interface CallInterface
{
	public function makeGetCall($curlCall, $authorizationBearer);
	public function makePostCall($curlCall, $authorizationBearer);
	public function makePutCall($curlCall, $authorizationBearer);
	public function makeDeleteCall($curlCall, $authorizationBearer);

}
