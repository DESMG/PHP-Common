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
        $this->assertEquals("test=test&timestamp=$t", $payload);
        $sign = $signature->sign();
        $this->assertEquals('2F6CCE17A7338C9223E6AF3516F3B005EC8DF982625DC934A257939262B0FB855F3006B59731CE0A555205D43C4CC16127FEFFBEA6118F20F7F710FB40312F5F', $sign);
    }
}
