<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;



final class UserTest extends TestCase
{       
    
    public function testCanBeCreatedFromValidEmailAddress(): void
    {
        $test = new MylibUser;
    }
}
