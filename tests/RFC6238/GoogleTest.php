<?php

namespace Tests\RFC6238;

use DESMG\RFC6238\Google;
use PHPUnit\Framework\TestCase;

final class GoogleTest extends TestCase
{
    public function testGenerateKey()
    {
        $key = Google::generateKey();
        $this->assertIsString($key);
        $this->assertEquals(32, strlen($key));
    }

    public function testGetPass()
    {
        $key = Google::generateKey();
        $google = Google::instance($key);
        $totp = $google->getPass();
        $this->assertIsString($totp);
        $this->assertEquals(6, strlen($totp));
    }

    public function testInstance()
    {
        $key = Google::generateKey();
        $instance = Google::instance($key);
        $this->assertInstanceOf(Google::class, $instance);
    }

    public function testVerifyTOTP()
    {
        $key = Google::generateKey();
        $google = Google::instance($key);
        $totp = $google->getPass();
        $this->assertTrue($google->verifyTOTP($totp));
    }
}
