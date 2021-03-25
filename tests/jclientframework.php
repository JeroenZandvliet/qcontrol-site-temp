<?php
/**
 * @package    com_iforder
 * @author     Bart van der Laan <bart@v-web.nl>
 * @copyright  2020 V-Web B.V.
 */

defined('CLI_RUN') or die('Restricted access.');

use Joomla\CMS\Factory;

class JClientFramework
{
    public static function init()
    {
        self::println("Initialising Joomla Framework");
        
        // Joomla requires this to run.
        define('_JEXEC', 1);
        
        self::defineBasePath();
        
        require_once JPATH_BASE . '/includes/defines.php';
        require_once JPATH_BASE . '/includes/framework.php';
        
        Factory::getApplication('cli');
        
        self::println("Joomla Framework Ready");
    }
    
    private static function defineBasePath()
    {
        $path = dirname(__FILE__) . '/';
        
        for ($i = 0; $i < 10; $i++) {
            if (file_exists($path . 'configuration.php')) {
                define('JPATH_BASE', realpath($path));
                break;
            }
            $path .= '../';
        }
        
        defined('JPATH_BASE') or die('ERROR: Unable to find Joomla base directory...');
    }
    
    public static function print(string $message)
    {
        if (!CRON_RUN) {
            echo $message;
        }
    }
    
    public static function println(string $message)
    {
        self::print($message . "\n");
    }
}