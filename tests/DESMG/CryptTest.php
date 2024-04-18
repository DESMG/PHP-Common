<?php

namespace Tests\DESMG;

use DESMG\DESMG\Crypt;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class CryptTest extends TestCase
{
    public function testCrypt()
    {
        $c = Crypt::encrypt('data', 'DE20240611174828818480FFEE057E02028915CF9DDB52B6CCFD49725B6FB301');
        $this->assertIsString($c);
        $this->assertNotEmpty($c);
        $d = Crypt::decrypt($c, 'DE20240611174828818480FFEE057E02028915CF9DDB52B6CCFD49725B6FB301');
        $this->assertIsString($d);
        $this->assertNotEmpty($d);
        $this->assertEquals('data', $d);
        try {
            $c = Crypt::encrypt('data', 'DE20240611174828818480FFEE0');
            $this->assertNotEmpty($c);
        } catch (InvalidArgumentException $e) {
            $this->assertEquals(36, $e->getLine());
        }
    }
}
