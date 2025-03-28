<?php

namespace Tests\IEEE1541;

use DESMG\IEEE1541\BinaryPrefixes;
use PHPUnit\Framework\TestCase;

class BinaryPrefixesTest extends TestCase
{

    public function testFormatSize()
    {
        $this->assertEquals('1.25 MiB', BinaryPrefixes::formatSize(1024 * 1024 * 1.25));
        $this->assertEquals('1.354081153 MiB', BinaryPrefixes::formatSize(17 ** 5));
        $this->assertEquals('1 B', BinaryPrefixes::formatSize(1));
        $this->assertEquals('1 KiB', BinaryPrefixes::formatSize(1024));
        $this->assertEquals('1 MiB', BinaryPrefixes::formatSize(1024 * 1024));
        $this->assertEquals('1 GiB', BinaryPrefixes::formatSize(1024 * 1024 * 1024));
        $this->assertEquals('1 TiB', BinaryPrefixes::formatSize(1024 * 1024 * 1024 * 1024));
        $this->assertEquals('1024 TiB', BinaryPrefixes::formatSize(1024 * 1024 * 1024 * 1024 * 1024));
        $this->assertEquals('1048576 TiB', BinaryPrefixes::formatSize(1024 * 1024 * 1024 * 1024 * 1024 * 1024));
    }
}
