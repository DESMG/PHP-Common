<?php

namespace Tests\DESMG;

use DESMG\DESMG\Signature;
use PHPUnit\Framework\TestCase;

class SignatureTest extends TestCase
{
    public function testSign()
    {
        $sign = Signature::sign('test', 'test');
        $this->assertEquals('125d6d03b32c84d492747f79cf0bf6e179d287f341384eb5d6d3197525ad6be8e6df0116032935698f99a09e265073d1d6c32c274591bf1d0a20ad67cba921bc', $sign);
    }
}
