<?php
/**
 * @package    lib_vweb-common
 * @author     Bart van der Laan <bart@v-web.nl>
 * @copyright  2021 V-Web B.V.
 */

// No direct access to this file.
defined('_JEXEC') or die('Restricted access');

// Attempt to register the library using Joomla standards in psr-4 format.
JLoader::registerNamespace('QControl\\Site\\', __DIR__."/src", false, false, 'psr4');