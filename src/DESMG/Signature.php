<?php

namespace DESMG\DESMG;

use DESMG\RFC6986\Hashs;

class Signature
{
    /**
     * @param array|string $data The data to sign
     * @param string $secret The API secret
     * @param Hashs $method The hash method to use
     * @param bool $hmac Whether to use HMAC
     * @param bool $RFC3986 Whether to use RFC3986 encoding or RFC1738 encoding
     * @param bool $appendSecretWhenHMAC Whether to append the secret to the data when using HMAC
     * @return string The signature
     */
    public static function sign(
        array|string $data,
        string       $secret,
        Hashs        $method = Hashs::SHA512,
        bool         $hmac = false,
        bool         $RFC3986 = true,
        bool         $appendSecretWhenHMAC = true,
    ): string
    {
        is_array($data) && ksort($data);
        $string = is_array($data)
            ?
            http_build_query($data, encoding_type: $RFC3986 ? PHP_QUERY_RFC3986 : PHP_QUERY_RFC1738)
            :
            $data;
        return $hmac
            ?
            hash_hmac(
                $method->value,
                $appendSecretWhenHMAC
                    ?
                    $string . $secret
                    :
                    $string,
                $secret
            )
            :
            hash(
                $method->value,
                $string . $secret
            );
    }
}
