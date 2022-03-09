<?php

namespace DESMG\RFC3548;

use InvalidArgumentException;

class Base32
{
    private static array $lut = [
        'A' => 0, 'B' => 1, 'C' => 2, 'D' => 3,
        'E' => 4, 'F' => 5, 'G' => 6, 'H' => 7,
        'I' => 8, 'J' => 9, 'K' => 10, 'L' => 11,
        'M' => 12, 'N' => 13, 'O' => 14, 'P' => 15,
        'Q' => 16, 'R' => 17, 'S' => 18, 'T' => 19,
        'U' => 20, 'V' => 21, 'W' => 22, 'X' => 23,
        'Y' => 24, 'Z' => 25, '2' => 26, '3' => 27,
        '4' => 28, '5' => 29, '6' => 30, '7' => 31,
    ];

    public static function decode(string $b32): string
    {
        $b32 = strtoupper($b32);
        if (!preg_match('/^[ABCDEFGHIJKLMNOPQRSTUVWXYZ234567]+$/', $b32)) {
            throw new InvalidArgumentException('Invalid base32 string');
        }
        $l = strlen($b32);
        $n = 0;
        $j = 0;
        $binary = '';
        for ($i = 0; $i < $l; $i++) {
            $n <<= 5;
            $n += self::$lut[$b32[$i]];
            $j += 5;
            if ($j >= 8) {
                $j -= 8;
                $binary .= chr(($n & (0xFF << $j)) >> $j);
            }
        }
        return $binary;
    }

    public static function encode(string $str): string
    {
        $l = strlen($str);
        $n = 0;
        $j = 0;
        $b32 = '';
        for ($i = 0; $i < $l; $i++) {
            $n <<= 8;
            $n += ord($str[$i]);
            $j += 8;
            while ($j >= 5) {
                $j -= 5;
                $b32 .= self::$lut[($n & (0x1F << $j)) >> $j];
            }
        }
        if ($j > 0) {
            $b32 .= self::$lut[($n & (0x1F << (5 - $j))) << (5 - $j)];
        }
        return $b32;
    }
}
