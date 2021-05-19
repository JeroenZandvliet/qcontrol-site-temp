<?php
/**
 * Helper class for Profile Component
 * 
 * @package    Joomla.Tutorials
 * @subpackage Modules
 * @link http://docs.joomla.org/J3.x:Creating_a_simple_module/Developing_a_Basic_Module
 * @license        GNU/GPL, see LICENSE.php
 * mod_qcontrol is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */

require_once(JPATH_ROOT.'/libraries/qcontrol/include.php');

// no direct access
defined('_JEXEC') or die('Restricted access');

use QControl\Site\Repository\AuthorizationRepository;
use QControl\Site\Repository\DriverRepository;
use QControl\Site\Models\SimplifiedDriver;
use QControl\Site\Models\Profile;

class ProfileComponentHelper
{


	public static function setAccessToken(){
		try{
			
			$authorizationRepository = new AuthorizationRepository();
			$accessToken = $authorizationRepository->setAuthenticationHeader();


		} catch(Error $error){
			echo "Error caught:  " . $error->getMessage();
		}
	}

	public static function checkIfAccessTokenIsSet(){

		$authorizationRepository = new AuthorizationRepository();
		$result = $authorizationRepository->checkIfAccessTokenIsSet();
		return $result;

	}

	public static function getDriverById(string $id): Profile
	{
		try{
			$driverRepository = new DriverRepository();
			$driver = $driverRepository->getDriverById($id);
			return $driver;
		} catch(Error $error){
			echo "Error caught:  " . $error->getMessage();
		}
	}


}