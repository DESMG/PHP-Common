<?php

namespace Tests\RFC8942;

use DESMG\RFC8942\RequestHeader;
use PHPUnit\Framework\TestCase;

class RequestHeaderTest extends TestCase
{
    public function testGetCURLHeaders()
    {
        $requestHeader = new RequestHeader('2.2', 6, 40, 124);
        $headers = $requestHeader->getCURLHeaders();
        $this->assertIsArray($headers);
    }
}
