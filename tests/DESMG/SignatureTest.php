<?php

namespace Tests\DESMG;

use DESMG\DESMG\Signature;
use PHPUnit\Framework\TestCase;

class SignatureTest extends TestCase
{
    public function testSign()
    {
        $t = '1700000000';
        $signature = new Signature(['test' => 'test'], $t, 'test');
        $payload = $signature->getPayload();
        $this->assertEquals("test=test&timestamp={$t}test", $payload);
        $sign = $signature->sign();
        $this->assertEquals('34D200B9295A39CFA5978410F034B5A336FC04652674C5378F6A926CA17CBC223357EEB0D5506B95CF39A9469EEC414F298AE944696C0CF9A305587DBDC30C97', $sign);
        $sign = $signature->sign();
        $this->assertEquals('34D200B9295A39CFA5978410F034B5A336FC04652674C5378F6A926CA17CBC223357EEB0D5506B95CF39A9469EEC414F298AE944696C0CF9A305587DBDC30C97', $sign);
    }
}
