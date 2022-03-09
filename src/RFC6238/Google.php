<?php

namespace DESMG\RFC6238;

class Google
{
    private static array $lut = [
        'A' => 0, 'B' => 1, 'C' => 2, 'D' => 3, 'E' => 4, 'F' => 5, 'G' => 6, 'H' => 7,
        'I' => 8, 'J' => 9, 'K' => 10, 'L' => 11, 'M' => 12, 'N' => 13, 'O' => 14, 'P' => 15,
        'Q' => 16, 'R' => 17, 'S' => 18, 'T' => 19, 'U' => 20, 'V' => 21, 'W' => 22, 'X' => 23,
        'Y' => 24, 'Z' => 25, '2' => 26, '3' => 27, '4' => 28, '5' => 29, '6' => 30, '7' => 31
    ];

    public static function verifyKey($b32seed, $key): bool
    {
        $timeStamp = self::getTimestamp();
        $binarySeed = self::base32_decode($b32seed);
        for ($ts = $timeStamp - 2; $ts <= $timeStamp + 2; $ts++) {
            if (self::oath_totp($binarySeed, $ts) == $key) {
                return true;
            }
        }
        return false;
    }

    private static function getTimestamp(): float
    {
        return floor(microtime(true) / 30);
    }

    private static function base32_decode($b32): string
    {
        $b32 = strtoupper($b32);
        if (!preg_match('/^[ABCDEFGHIJKLMNOPQRSTUVWXYZ234567]+$/', $b32, $match)) {
            exit('Invalid characters in the base32 string.');
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

    public static function oath_totp(string $key, $counter): string
    {
        if (strlen($key) < 8) {
            exit('Secret key is too short. Must be at least 16 base 32 characters.');
        }
        $bin_counter = pack('N*', 0) . pack('N*', $counter);
        $hash = hash_hmac('sha256', $bin_counter, $key, true);
        return str_pad(self::oath_truncate($hash), 8, '0', STR_PAD_LEFT);
    }

    private static function oath_truncate($hash): int
    {
        $offset = ord($hash[19]) & 0xF;
        return (
                ((ord($hash[$offset + 0]) & 0x7F) << 24) |
                ((ord($hash[$offset + 1]) & 0xFF) << 16) |
                ((ord($hash[$offset + 2]) & 0xFF) << 8) |
                ord($hash[$offset + 3]) & 0xFF
            ) % pow(10, 8);
    }

    public static function generateKey(): string
    {
        $b32 = '234567QWERTYUIOPASDFGHJKLZXCVBNM';
        $s = '';
        for ($i = 0; $i < 32; $i++) {
            $s .= $b32[rand(0, 31)];
        }
        return $s;
    }
}
