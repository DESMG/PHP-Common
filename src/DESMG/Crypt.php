<?php

namespace DESMG\DESMG;

use DESMG\RFC6986\Hash;
use InvalidArgumentException;
use Throwable;

class Crypt
{
    public static function decrypt(string $cipher, string $key): ?string
    {
        try {
            $key = hex2bin($key);
            $cipher = hex2bin($cipher);
            $iv = substr($cipher, 0, 16);
            $tag = substr($cipher, 16, 16);
            $cipher = substr($cipher, 32);
            $aad = hex2bin(Hash::sha512($iv));
            $data = openssl_decrypt($cipher, '2.16.840.1.101.3.4.1.46', $key, OPENSSL_RAW_DATA, $iv, $tag, $aad);
            if (is_string($data)) {
                return $data;
            } else {
                return null;
            }
        } catch (Throwable) {
            return null;
        }
    }

    public static function encrypt(string $payload, string $key): ?string
    {
        if ((strtoupper($key) == $key) && ctype_xdigit($key) && strlen($key) === 64) {
            $key = hex2bin($key);
        } else {
            throw new InvalidArgumentException('Key must be upper case hex encoded and 32 bytes / 64 characters long');
        }
        try {
            $iv = openssl_random_pseudo_bytes(16); // 128 bits instead of 96 bits for more security
            $aad = hex2bin(Hash::sha512($iv));
            $tag = null;
            $cipher = openssl_encrypt($payload, '2.16.840.1.101.3.4.1.46', $key, OPENSSL_RAW_DATA, $iv, $tag, $aad);
            if (strlen($cipher) > 0) {
                return strtoupper(bin2hex($iv . $tag . $cipher)); // 16 + 16 + {$cipher} | cipher length equals to $data
            } else {
                return null;
            }
        } catch (Throwable) {
            return null;
        }
    }
}
