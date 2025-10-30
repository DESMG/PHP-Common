<?php

namespace DESMG\RFC6238;

use DESMG\RFC4648\Base32;

final readonly class Google
{
    private function __construct(
        private string $key = '',
        private string $algorithm = 'sha1',
        private int    $length = 6,
        private int    $window = 2,
        public int     $timestamp = 0,
    )
    {
    }

    public static function generateKey(): string
    {
        $b32 = '234567QWERTYUIOPASDFGHJKLZXCVBNM';
        $s = '';
        for ($i = 0; $i < 32; $i++) {
            /** @noinspection PhpUnhandledExceptionInspection */
            $s .= $b32[random_int(0, 31)];
        }
        return $s;
    }

    public static function instance(string $key, string $algorithm = 'sha1', int $length = 6, int $window = 2, int $period = 30): ?self
    {
        if (!in_array($algorithm, ['sha1', 'sha256', 'sha512'], true)) {
            return null;
        }
        if ($length != 6 && $length != 8) {
            return null;
        }
        if ($window < 0 || $window > 2) {
            return null;
        }
        if (!in_array($period, [30, 60], true)) {
            return null;
        }
        return new self($key, $algorithm, $length, $window, (int)floor(microtime(true) / $period));
    }

    public function getPass(?int $counter = null): string|false
    {
        $key = Base32::decode($this->key);
        $bin_counter = pack('N*', 0) . pack('N*', $counter ?? $this->timestamp);
        $hash = hash_hmac($this->algorithm, $bin_counter, $key, true);
        $offset = ord($hash[strlen($hash) - 1]) & 0xF;
        $temp = unpack('N', substr($hash, $offset, 4));
        $temp = $temp[1] & 0x7FFFFFFF;
        $hash = substr($temp, 0 - $this->length);
        return str_pad($hash, $this->length, '0', STR_PAD_LEFT);
    }

    public function verifyHOTP(string $pass, int $counter = 0): bool
    {
        return $this->getPass($counter) == $pass;
    }

    public function verifyTOTP(string $pass): bool
    {
        $timeStamp = $this->timestamp;
        for ($ts = $timeStamp - $this->window; $ts <= $timeStamp + $this->window; $ts++) {
            if ($this->getPass($ts) == $pass) {
                return true;
            }
        }
        return false;
    }
}
