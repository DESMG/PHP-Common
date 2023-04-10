<?php

namespace Tests\Units;

use DESMG\RFC792\Ping;

class PingTest
{
    public function testPing(): void
    {
        $ping = new Ping();
        $ping->setTimeout(1);
        $ping->setHost('www.desmg.com');
        echo 'Ping ' . $ping->getHost() . '...' . PHP_EOL;
        echo $ping->run();
        echo $ping->getLatency() . 'ms' . PHP_EOL;
        echo $ping->getLossRate() . '%' . PHP_EOL;
        $ping->setHost('www.google.com');
        echo 'Ping ' . $ping->getHost() . '...' . PHP_EOL;
        echo $ping->run();
        echo $ping->getLatency() . 'ms' . PHP_EOL;
        echo $ping->getLossRate() . '%' . PHP_EOL;
        $ping->setHost('www.baidu.com');
        echo 'Ping ' . $ping->getHost() . '...' . PHP_EOL;
        echo $ping->run();
        echo $ping->getLatency() . 'ms' . PHP_EOL;
        echo $ping->getLossRate() . '%' . PHP_EOL;
    }
}