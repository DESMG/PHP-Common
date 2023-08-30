<?php

namespace DESMG\RFC6986;

class Hash
{
    public static function sha256_equals(string $hash, string $data, string $key = ''): bool
    {
        return hash_equals($hash, self::sha256($data, $key));
    }

    /**
     * @return string 64 characters long
     */
    public static function sha256(string $data, string $key = ''): string
    {
        return strtoupper($key == '' ? hash('sha256', $data) : hash_hmac('sha256', $data, $key));
    }

    public static function sha256_file_equals(string $hash, string $data, string $key = ''): bool
    {
        return hash_equals($hash, self::sha256_file($data, $key));
    }

    /**
     * @return string 64 characters long
     */
    public static function sha256_file(string $data, string $key = ''): string
    {
        return strtoupper($key == '' ? hash_file('sha256', $data) : hash_hmac_file('sha256', $data, $key));
    }

    public static function sha384_equals(string $hash, string $data, string $key = ''): bool
    {
        return hash_equals($hash, self::sha384($data, $key));
    }

    /**
     * @return string 96 characters long
     */
    public static function sha384(string $data, string $key = ''): string
    {
        return strtoupper($key == '' ? hash('sha384', $data) : hash_hmac('sha384', $data, $key));
    }

    public static function sha384_file_equals(string $hash, string $data, string $key = ''): bool
    {
        return hash_equals($hash, self::sha384_file($data, $key));
    }

    /**
     * @return string 96 characters long
     */
    public static function sha384_file(string $data, string $key = ''): string
    {
        return strtoupper($key == '' ? hash_file('sha384', $data) : hash_hmac_file('sha384', $data, $key));
    }

    public static function sha512_equals(string $hash, string $data, string $key = ''): bool
    {
        return hash_equals($hash, self::sha512($data, $key));
    }

    /**
     * @return string 128 characters long
     */
    public static function sha512(string $data, string $key = ''): string
    {
        return strtoupper($key == '' ? hash('sha512', $data) : hash_hmac('sha512', $data, $key));
    }

    public static function sha512_file_equals(string $hash, string $data, string $key = ''): bool
    {
        return hash_equals($hash, self::sha512_file($data, $key));
    }

    /**
     * @return string 128 characters long
     */
    public static function sha512_file(string $data, string $key = ''): string
    {
        return strtoupper($key == '' ? hash_file('sha512', $data) : hash_hmac_file('sha512', $data, $key));
    }
}
