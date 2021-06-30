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
	public function sendGetCall($curlCall, $authorizationBearer);
	public function sendPostCall($curlCall, $authorizationBearer, $postData);
	public function sendUpdateCall($curlCall, $authorizationBearer, $postData);
	public function sendDeleteCall($curlCall, $authorizationBearer);

}
