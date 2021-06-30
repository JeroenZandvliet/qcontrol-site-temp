<?php

/**
 * @package    QControl.Library
 * @author     Jeroen Zandvliet (jeroen@v-web.nl)
 * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */


require_once dirname(__FILE__).'/jclientframework.php';

JClientFramework::init();

// Attempt to register the library using Joomla standards in psr-4 format.
JLoader::registerNamespace('QControl\\Site\\', __DIR__."/src", false, false, 'psr4');