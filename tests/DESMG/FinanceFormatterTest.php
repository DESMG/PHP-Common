<?php

namespace Tests\DESMG;

use DESMG\DESMG\FinanceFormatter;
use PHPUnit\Framework\TestCase;

class FinanceFormatterTest extends TestCase
{

    public function testFormat()
    {
        $this->assertEquals(1.23, FinanceFormatter::format(1.234));
        $this->assertEquals(1.24, FinanceFormatter::format(1.235));
        $this->assertEquals(1.24, FinanceFormatter::format(1.234, 2, FinanceFormatter::CEIL));
        $this->assertEquals(1.24, FinanceFormatter::format(1.235, 2, FinanceFormatter::CEIL));
        $this->assertEquals(1.23, FinanceFormatter::format(1.234, 2, FinanceFormatter::FLOOR));
        $this->assertEquals(1.23, FinanceFormatter::format(1.235, 2, FinanceFormatter::FLOOR));
    }

    public function testc2y()
    {
        $this->assertEquals(1.23, FinanceFormatter::c2y(123));
        $this->assertEquals(12.34, FinanceFormatter::c2y(1234));
        $this->assertEquals(123.45, FinanceFormatter::c2y(12345));
    }

    public function testy2c()
    {
        $this->assertEquals(123, FinanceFormatter::y2c(1.23));
        $this->assertEquals(1234, FinanceFormatter::y2c(12.34));
        $this->assertEquals(12345, FinanceFormatter::y2c(123.45));
    }
}
