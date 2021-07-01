<?php

/**
 * @package    QControl.Library
 * @author     Jeroen Zandvliet (jeroen@v-web.nl)
 * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace QControl\Site\Calls;

// no direct access
defined('_JEXEC') or die('Restricted access');

interface CallInterface
{
	public function sendGetCall(string $curlCall, string $authorizationBearer);
	public function sendPostCall(string $curlCall, string $authorizationBearer, array $postData);
	public function sendUpdateCall(string $curlCall, string $authorizationBearer, array $postData);
	public function sendDeleteCall(string $curlCall, string $authorizationBearer);

}
