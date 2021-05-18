<?php
namespace QControl\Site\HttpApi;

// no direct access
defined('_JEXEC') or die('Restricted access');

interface HttpInterface
{
	public function setUpGetAllCall();
	public function setUpGetByIdCall($id);
	public function setUpPostCall($request);
	public function setUpPutCall($request);
	public function setUpDeleteCall($request);
	public function checkIfAccessTokenIsSet();

}
