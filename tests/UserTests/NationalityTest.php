<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Joomla\CMS\Factory;


require_once dirname(__FILE__).'../../../libraries/ApiLib/include.php';

use QControl\Site\Nationalities;

final class NationalityTest extends TestCase
{           
    public function testIsAnObject(): void
    {
        $nationalities = new Nationalities();
        $nationalities->getNationalities();
        $this->assertIsObject($nationalities);

    }
}
