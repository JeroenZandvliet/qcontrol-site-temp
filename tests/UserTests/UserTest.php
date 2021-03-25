<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Joomla\CMS\Factory;


print_r(JPATH_ROOT);
require_once(JPATH_ROOT.'/tests/jclientframework.php');
require_once(JPATH_ROOT.'/libraries/ApiLib/include.php');

use QControl\Site\Nationalities;
use JClientFramework;

final class UserTest extends TestCase
{       
    function init():void
    {
        $JClient = new JClientFramework();
    }

    
    public function testCanBeCreatedFromValidEmailAddress(): void
    {
        echo "Meow";
    }
}
