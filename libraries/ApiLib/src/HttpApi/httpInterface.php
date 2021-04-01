<?php
namespace QControl\Site\HttpApi;

interface HttpInterface
{
	public function setUpGetAllCall();
	public function setUpGetCall($request);
	public function setUpPostCall($request);
	public function setUpPutCall($request);
	public function setUpDeleteCall($request);

}
