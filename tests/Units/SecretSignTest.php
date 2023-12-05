<?php

namespace Tests\Units;

use DESMG\RestfulSignature\SecretSignature;
use DESMG\RFC6986\HashMethods;

class SecretSignTest
{
    public function testSecretSign(): void
    {
        echo SecretSignature::sign(['a' => 'b', 'c' => 'd',], '123456', HashMethods::SHA256) . PHP_EOL;
        echo SecretSignature::sign(['a' => 'b', 'c' => 'd',], '123456', HashMethods::SHA256, true) . PHP_EOL;
    }
}
