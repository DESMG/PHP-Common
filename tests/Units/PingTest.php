<?php

namespace Tests\Units;

use DESMG\RFC792\Ping;
use Exception;

class PingTest
{
    /**
     * @throws Exception
     */
    public function testPing(): void
    {
        $ping = new Ping();
        $ping->setTimeout(1);
        $ping->setHost('www.desmg.com');
        echo 'Ping ' . $ping->getHost() . '... ';
        $ping->run();
        echo $ping->getLatency() . 'ms' . ' ' . $ping->getLossRate() . '%' . PHP_EOL;
        $ping->setHost('www.google.com');
        echo 'Ping ' . $ping->getHost() . '... ';
        $ping->run();
        echo $ping->getLatency() . 'ms' . ' ' . $ping->getLossRate() . '%' . PHP_EOL;
        $ping->setHost('www.baidu.com');
        echo 'Ping ' . $ping->getHost() . '... ';
        $ping->run();
        echo $ping->getLatency() . 'ms' . ' ' . $ping->getLossRate() . '%' . PHP_EOL;
    }
}
