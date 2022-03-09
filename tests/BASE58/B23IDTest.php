<?php

namespace Tests\BASE58;

use DESMG\BASE58\B23ID;
use PHPUnit\Framework\TestCase;

final class B23IDTest extends TestCase
{
    public function testB23ID(): void
    {
        $avid = 'av111298867365120';
        $bvid = B23ID::AV2BV($avid);
        $this->assertEquals('BV1L9Uoa9EUx', $bvid);
        $aid = B23ID::BV2AV($bvid);
        $this->assertEquals($avid, $aid);
        $avid = 'av2251799813685247';
        $bvid = B23ID::AV2BV($avid);
        $this->assertEquals('BV1aPPTfmvQq', $bvid);
        $aid = B23ID::BV2AV($bvid);
        $this->assertEquals($avid, $aid);
        // error values test
        $avid = 'av2251799813685248';
        $bvid = B23ID::AV2BV($avid);
        $this->assertEquals('BV1xx411c7mX', $bvid); // error value
        $aid = B23ID::BV2AV($bvid);
        $this->assertEquals('av0', $aid); // error value
    }
}
