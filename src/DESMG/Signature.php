<?php

namespace DESMG\DESMG;

use DESMG\RFC6986\Hashs;

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
        $this->payload = "$this->data&timestamp=$timestamp$this->secret";
    }

    public function getPayload(): string
    {
        return $this->payload;
    }

    public function sign(): string
    {
        $sign = hash(Hashs::SHA512->value, $this->payload);
        return strtoupper($sign);
    }
}
