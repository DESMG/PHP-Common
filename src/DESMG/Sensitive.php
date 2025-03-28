<?php

namespace DESMG\DESMG;

use DESMG\RFC6986\Hash;
use RuntimeException;

final readonly class Sensitive
{
    public static function decrypt(string $plain, string $payload, string $encryptionKey): string
    {
        $firsrStarPos = strpos($plain, '*');
        $lastStarPos = strrpos($plain, '*');
        $prefix = substr($plain, 0, $firsrStarPos);
        $suffix = substr($plain, $lastStarPos + 1);
        $sensitiveData = Crypt::decrypt($payload, $encryptionKey);
        if (!$sensitiveData) {
            throw new RuntimeException('Failed to decrypt sensitive data');
        }
        return $prefix . $sensitiveData . $suffix;
    }

    public static function encrypt(string $sensitiveData, string $encryptionKey, int $prefixPlainLen = 3, int $suffixPlainLen = 4): array
    {
        $hash = Hash::sha512($sensitiveData);
        $prefix = substr($sensitiveData, 0, $prefixPlainLen);
        $suffix = substr($sensitiveData, -$suffixPlainLen);
        $sensitiveData = substr($sensitiveData, $prefixPlainLen, -$suffixPlainLen);
        $stars = str_repeat('*', strlen($sensitiveData));
        $payload = Crypt::encrypt($sensitiveData, $encryptionKey);
        if (!$payload) {
            throw new RuntimeException('Failed to encrypt sensitive data');
        }
        return [
            $prefix . $stars . $suffix,
            $hash,
            $payload,
        ];
    }

    public static function mb_decrypt(string $plain, string $payload, string $encryptionKey): string
    {
        $firsrStarPos = mb_strpos($plain, '*');
        $lastStarPos = mb_strrpos($plain, '*');
        $prefix = mb_substr($plain, 0, $firsrStarPos);
        $suffix = mb_substr($plain, $lastStarPos + 1);
        $sensitiveData = Crypt::decrypt($payload, $encryptionKey);
        if (!$sensitiveData) {
            throw new RuntimeException('Failed to decrypt sensitive data');
        }
        return $prefix . $sensitiveData . $suffix;
    }

    public static function mb_encrypt(string $sensitiveData, string $encryptionKey, int $prefixPlainLen = 1, int $suffixPlainLen = 1): array
    {
        $hash = Hash::sha512($sensitiveData);
        $prefix = mb_substr($sensitiveData, 0, $prefixPlainLen);
        $suffix = mb_substr($sensitiveData, -$suffixPlainLen);
        $sensitiveData = mb_substr($sensitiveData, $prefixPlainLen, -$suffixPlainLen);
        $stars = str_repeat('*', mb_strlen($sensitiveData));
        $payload = Crypt::encrypt($sensitiveData, $encryptionKey);
        if (!$payload) {
            throw new RuntimeException('Failed to encrypt sensitive data');
        }
        return [
            $prefix . $stars . $suffix,
            $hash,
            $payload,
        ];
    }
}
