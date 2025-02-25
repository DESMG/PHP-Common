<?php

namespace DESMG\RFC4648;

class Base64
{
    public static function urldecode(string $data): false|string
    {
        return base64_decode(str_replace(['-', '_'], ['+', '/'], $data));
    }

    public static function urlencode(string $data): string
    {
        return rtrim(str_replace(['+', '/'], ['-', '_'], base64_encode($data)), '=');
    }
}
