<?php

namespace Tests\Units;

use DESMG\RFC4122\UUID;

class UUIDLengthTest
{
    public function testUUIDLength(): void
    {
        echo 'generateUniqueID: ' . strlen(UUID::generateUniqueID()) . PHP_EOL;
        echo 'generateShortUniqueID: ' . strlen(UUID::generateShortUniqueID()) . PHP_EOL;
        echo 'generateTinyUniqueID: ' . strlen(UUID::generateTinyUniqueID()) . PHP_EOL;
        echo 'official: ' . strlen(UUID::uuid()) . PHP_EOL;
    }
}