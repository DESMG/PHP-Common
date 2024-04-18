<?php

namespace DESMG\RFC4122;

use DateTime;
use Random\RandomException;

class UUID
{
    /**
     * @return string 32 characters long
     * @deprecated
     */
    public static function generateShortUniqueID(): string
    {
        return self::DEID32();
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

    /**
     * @return string 16 characters long
     * @deprecated
     */
    public static function generateTinyUniqueID(): string
    {
        return self::DEID16();
    }

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
     * @return string 64 characters long
     * @deprecated
     */
    public static function generateUniqueID(): string
    {
        return self::DEID64();
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
     * @return string 16 characters long
     */
    public static function id16(): string
    {
        return (new DateTime)->format('Uu');
    }

    /**
     * @return string 32 characters long
     */
    public static function id32(): string
    {
        $time = new DateTime;
        $time = $time->format('YmdHisu');
        $random = self::random(12);
        return "$time$random";
    }

    /**
     * @return string 64 characters long
     */
    public static function id64(): string
    {
        $time = new DateTime;
        $time = $time->format('YmdHisu');
        $random = self::random(44);
        return "$time$random";
    }

    /**
     * @return string 64 characters long binary integer in string
     */
    public static function randomizedSnowflake(): string
    {
        $time = (new DateTime)->format('Uv') - 17130_00000_000;
        $id = str_pad(decbin($time), 41, '0', STR_PAD_LEFT);
        for ($i = 0; $i < 22; $i++) {
            try {
                $id .= random_int(0, 1);
            } catch (RandomException) {
                $id .= rand(0, 1);
            }
        }
        return "0$id";
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
}
