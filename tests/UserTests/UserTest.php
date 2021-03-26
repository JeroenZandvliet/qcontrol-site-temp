<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Joomla\CMS\Factory;


require_once dirname(__FILE__).'../../../libraries/ApiLib/include.php';

use QControl\Site\Nationalities;

final class UserTest extends TestCase
{           
    public function testCanBeCreatedFromValidEmailAddress(): void
    {
        echo "Meow";
    }
}
