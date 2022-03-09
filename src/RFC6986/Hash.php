<?php

namespace DESMG\RFC6986;

class Hash
{
    public static function sha256(string $data, string $key = ''): string
    {
        return strtoupper($key == '' ? hash('sha256', $data, false) : hash_hmac('sha256', $data, $key, false));
    }

    public static function sha256_file(string $data, string $key = ''): string
    {
        return strtoupper($key == '' ? hash_file('sha256', $data, false) : hash_hmac_file('sha256', $data, $key, false));
    }

    public static function sha512(string $data, string $key = ''): string
    {
        return strtoupper($key == '' ? hash('sha512', $data, false) : hash_hmac('sha512', $data, $key, false));
    }

    public static function sha512_file(string $data, string $key = ''): string
    {
        return strtoupper($key == '' ? hash_file('sha512', $data, false) : hash_hmac_file('sha512', $data, $key, false));
    }
}
