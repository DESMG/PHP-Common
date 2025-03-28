<?php

namespace Tests\RFC4122;

use DESMG\RFC4122\UUID;
use PHPUnit\Framework\TestCase;

class UUIDTest extends TestCase
{
    public function testDEID16()
    {
        $id = UUID::DEID16();
        $this->assertEquals(16, strlen($id));
    }

    public function testDEID32()
    {
        $id = UUID::DEID32();
        $this->assertEquals(32, strlen($id));
    }

    public function testDEID64()
    {
        $id = UUID::DEID64();
        $this->assertEquals(64, strlen($id));
    }

    public function testRandom()
    {
        $id = UUID::random(16);
        $this->assertEquals(16, strlen($id));
    }

    public function testRandomBytes()
    {
        $id = UUID::randomBytes(16);
        $this->assertEquals(16, strlen($id));
        $id = strtoupper(bin2hex(UUID::randomBytes(16)));
        $this->assertEquals(32, strlen($id));
    }
}
