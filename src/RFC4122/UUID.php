<?php

namespace DESMG\RFC4122;

use DateTime;

class UUID
{
    /**
     * @return string 32 characters long
     */
    public static function generateShortUniqueID(): string
    {
        $time = new DateTime;
        $time = $time->format('YmdHisu');
        $random = self::random(8);
        /** @noinspection PhpUnnecessaryCurlyVarSyntaxInspection */
        return "DE{$time}FF{$random}";
    }

    /**
     * @return string {$length} characters long
     */
    public static function random(int $length): string
    {
        do {
            $bytes = openssl_random_pseudo_bytes($length / 2, $strong_result);
        } while (!$strong_result);
        return strtoupper(bin2hex($bytes));
    }

    /**
     * @return string 16 characters long
     */
    public static function generateTinyUniqueID(): string
    {
        $time = new DateTime;
        $time = $time->format('U');
        $random = self::random(6);
        return "$time$random";
    }

    /**
     * @return string 64 characters long
     */
    public static function generateUniqueID(): string
    {
        $time = new DateTime;
        $time = $time->format('YmdHisu');
        $random = self::random(40);
        /** @noinspection PhpUnnecessaryCurlyVarSyntaxInspection */
        return "DE{$time}FF{$random}";
    }

    /**
     * @return string 36 characters long
     */
    public static function uuid(): string
    {
        $data = self::randomBytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

    /**
     * @return string {$length} characters long
     */
    public static function randomBytes(int $length): string
    {
        do {
            $bytes = openssl_random_pseudo_bytes($length, $strong_result);
        } while (!$strong_result);
        return $bytes;
    }
}
