<?php

namespace DESMG;

use DateTime;

class UUID
{
    public static function generateUniqueID(): string
    {
        $time = new DateTime;
        $time = $time->format('YmdHisu');
        $random = self::random(40);
        /** @noinspection PhpUnnecessaryCurlyVarSyntaxInspection */
        return "DE{$time}FF{$random}";
    }

    public static function random(int $length): string
    {
        do {
            $bytes = openssl_random_pseudo_bytes($length / 2, $strong_result);
        } while (!$strong_result);
        return strtoupper(bin2hex($bytes));
    }

    public static function generateShortUniqueID(): string
    {
        $time = new DateTime;
        $time = $time->format('YmdHisu');
        $random = self::random(8);
        /** @noinspection PhpUnnecessaryCurlyVarSyntaxInspection */
        return "DE{$time}FF{$random}";
    }

    public static function generateTinyUniqueID(): string
    {
        $time = new DateTime;
        $time = $time->format('U');
        $random = self::random(6);
        return "$time$random";
    }
}
