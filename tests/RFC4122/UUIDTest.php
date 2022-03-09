<?php

namespace Tests\RFC4122;

use DESMG\RFC4122\UUID;
use PHPUnit\Framework\TestCase;

class UUIDTest extends TestCase
{

    public function testGenerateShortUniqueID()
    {
        $id = UUID::generateShortUniqueID();
        $this->assertEquals(32, strlen($id));
    }

    public function testGenerateTinyUniqueID()
    {
        $id = UUID::generateTinyUniqueID();
        $this->assertEquals(16, strlen($id));
    }

    public function testGenerateUniqueID()
    {
        $id = UUID::generateUniqueID();
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
    }

    public function testUuid()
    {
        $id = UUID::uuid();
        $this->assertEquals(36, strlen($id));
    }
}
