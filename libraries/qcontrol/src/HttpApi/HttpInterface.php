<?php
namespace QControl\Site\HttpApi;

interface HttpInterface
{
	public function setUpGetAllCall();
	public function setUpGetByIdCall($id);
	public function setUpPostCall($request);
	public function setUpPutCall($request);
	public function setUpDeleteCall($request);

}
