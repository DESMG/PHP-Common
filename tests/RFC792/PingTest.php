<?php

namespace Tests\RFC792;

use DESMG\RFC792\Ping;
use Exception;
use PHPUnit\Framework\TestCase;

class PingTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testPing(): void
    {
        $ping = new Ping;
        $ping->setTimeout(1);
        $ping->setHost('127.0.0.1');
        $ping->run(2);
        $this->assertIsFloat($ping->getLatency());
        $this->assertIsFloat($ping->getLossRate());
    }
}
