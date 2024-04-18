<?php

namespace DESMG\IEEE1541;

class BinaryPrefixes
{
    public static function formatSize(int $byte, bool $bit = false): string
    {
        $unit = 'B';
        if ($bit) {
            $byte = bcdiv($byte, 8, 3);
        }
        if ($byte >= 1024) {
            $byte = bcdiv($byte, 1024, 6);
            $unit = 'KiB';
        }
        if ($byte >= 1024) {
            $byte = bcdiv($byte, 1024, 9);
            $unit = 'MiB';
        }
        if ($byte >= 1024) {
            $byte = bcdiv($byte, 1024, 12);
            $unit = 'GiB';
        }
        $byte = rtrim($byte, '.0');
        return "$byte $unit";
    }
}
