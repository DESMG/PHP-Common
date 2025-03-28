<?php

namespace DESMG\RFC4122;

use DateTime;

final readonly class UUID
{
    /**
     * @return string 16 characters long
     */
    public static function DEID16(): string
    {
        $time = new DateTime;
        $time = $time->format('U');
        $random = self::random(6);
        return "$time$random";
    }

    /**
     * @return string 32 characters long
     */
    public static function DEID32(): string
    {
        $time = new DateTime;
        $time = $time->format('YmdHisu');
        $random = self::random(8);
        /** @noinspection PhpUnnecessaryCurlyVarSyntaxInspection */
        return "DE{$time}FF{$random}";
    }

    /**
     * @return string 64 characters long
     */
    public static function DEID64(): string
    {
        $time = new DateTime;
        $time = $time->format('YmdHisu');
        $random = self::random(40);
        /** @noinspection PhpUnnecessaryCurlyVarSyntaxInspection */
        return "DE{$time}FF{$random}";
    }

    /**
     * @return string dymamic length hex string
     */
    public static function random(int $length): string
    {
        $bytes = self::randomBytes($length / 2);
        return strtoupper(bin2hex($bytes));
    }

    /**
     * @return string dymamic length binary string
     */
    public static function randomBytes(int $length): string
    {
        do {
            $bytes = openssl_random_pseudo_bytes($length, $strong_result);
        } while (!$strong_result);
        return $bytes;
    }
}
