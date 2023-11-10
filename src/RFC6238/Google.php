<?php

namespace DESMG\RFC6238;

class Google
{
    private static array $lut = [
        'A' => 0, 'B' => 1, 'C' => 2, 'D' => 3, 'E' => 4, 'F' => 5, 'G' => 6, 'H' => 7,
        'I' => 8, 'J' => 9, 'K' => 10, 'L' => 11, 'M' => 12, 'N' => 13, 'O' => 14, 'P' => 15,
        'Q' => 16, 'R' => 17, 'S' => 18, 'T' => 19, 'U' => 20, 'V' => 21, 'W' => 22, 'X' => 23,
        'Y' => 24, 'Z' => 25, '2' => 26, '3' => 27, '4' => 28, '5' => 29, '6' => 30, '7' => 31,
    ];

    public static function generateKey(): string
    {
        $b32 = '234567QWERTYUIOPASDFGHJKLZXCVBNM';
        $s = '';
        for ($i = 0; $i < 32; $i++) {
            /** @noinspection PhpUnhandledExceptionInspection */
            $s .= $b32[random_int(0, 31)];
        }
        return $s;
    }

    public static function verify(string $key, string $pass): bool
    {
        $timeStamp = self::getTimestamp();
        for ($ts = $timeStamp - 2; $ts <= $timeStamp + 2; $ts++) {
            if (self::getPass($key, $ts) == $pass) {
                return true;
            }
        }
        return false;
    }

    public static function getTimestamp(): int
    {
        return (int)floor(microtime(true) / 30);
    }

    public static function getPass(string $key, int $counter): string|false
    {
        if (strlen($key) < 16) {
            return false;
        }
        $key = self::base32_decode($key);
        $bin_counter = pack('N*', 0) . pack('N*', $counter);
        $hash = hash_hmac('sha1', $bin_counter, $key, true);
        $hash = self::truncate($hash);
        return str_pad($hash, 6, '0', STR_PAD_LEFT);
    }

    private static function base32_decode(string $b32): string
    {
        $b32 = strtoupper($b32);
        if (!preg_match('/^[ABCDEFGHIJKLMNOPQRSTUVWXYZ234567]+$/', $b32)) {
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

    private static function truncate(string $hash): int
    {
        $offset = ord($hash[strlen($hash) - 1]) & 0xF;
        $temp = unpack('N', substr($hash, $offset, 4));
        $temp = $temp[1] & 0x7FFFFFFF;
        return substr($temp, -6);
    }
}
