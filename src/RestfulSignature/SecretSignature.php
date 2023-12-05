<?php

namespace DESMG\RestfulSignature;

use Closure;
use DESMG\RFC6986\Hash;
use DESMG\RFC6986\HashMethods;

class SecretSignature
{
    /**
     * @param array $data The data to sign
     * @param string $apiSecret The API secret
     * @param bool $RFC3986 Whether to use RFC3986 encoding or RFC1738 encoding
     * @return string The signature
     */
    public static function sign(array $data, string $apiSecret, HashMethods|Closure|callable $method, bool $hmac = false, bool $RFC3986 = true): string
    {
        ksort($data);
        $string = http_build_query($data, encoding_type: $RFC3986 ? PHP_QUERY_RFC3986 : PHP_QUERY_RFC1738);
        $fullMethod = $method instanceof HashMethods ? (Hash::class . '::' . $method->value) : $method;
        return $string ? strtoupper($hmac ? $fullMethod($string, $apiSecret) : $fullMethod($string . $apiSecret)) : '';
    }
}
