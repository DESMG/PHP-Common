<?php

namespace DESMG\IEEE1541;

readonly class BinaryPrefixes
{
    public static function formatSize(int $byte, bool $bit = false): string
    {
        $units = ['B', 'KiB', 'MiB', 'GiB', 'TiB'];
        if ($bit) {
            $byte = bcdiv($byte, 8, 3);
        }
        foreach ($units as $i => $unit) {
            if ($byte < 1024 || $i === count($units) - 1) {
                break;
            }
            $byte = bcdiv($byte, 1024, 3 * ($i + 2));
        }
        return sprintf("%s %s", rtrim($byte, '.0'), $unit);
    }
}
