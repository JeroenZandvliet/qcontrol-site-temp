<?php

/**
 * @package    QControl.Library
 * @author     Jeroen Zandvliet (jeroen@v-web.nl)
 * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace QControl\Site\HttpApi;

// no direct access
defined('_JEXEC') or die('Restricted access');

use Joomla\CMS\Factory;

interface HttpInterface
{
	public function setUpGetAllCall();
	public function setUpGetByIdCall(int $id);
	public function setUpPostCall($request);
	public function setUpPutCall($request);
	public function setUpDeleteCall(int $id);

}
