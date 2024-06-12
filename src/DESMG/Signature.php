<?php

namespace DESMG\DESMG;

use DESMG\RFC6986\Hash;

class Signature
{
    private readonly string $data;
    private readonly string $secret;
    private string $payload;

    public function __construct(array $data, int|string $timestamp, string $secret)
    {
        ksort($data);
        $data = http_build_query($data, encoding_type: PHP_QUERY_RFC3986);
        $this->data = $data;
        $this->secret = $secret;
        $this->payload = "$this->data&timestamp=$timestamp";
    }

    public function getPayload(): string
    {
        return $this->payload;
    }

    public function sign(): string
    {
        $sign = Hash::sha512($this->payload, $this->secret);
        return strtoupper($sign);
    }
}
