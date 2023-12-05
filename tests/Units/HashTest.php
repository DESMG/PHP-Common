<?php

namespace Tests\Units;

use DESMG\RFC6986\Hash;

class HashTest
{
    public function testHash(): void
    {
        $hash = new Hash;
        $data = '123456';
        $key = '123456';
        $file = __FILE__;

        echo $hash->md5($data) . PHP_EOL;
        echo $hash->sha1($data) . PHP_EOL;
        echo $hash->sha256($data) . PHP_EOL;
        echo $hash->sha384($data) . PHP_EOL;
        echo $hash->sha512($data) . PHP_EOL;
        echo $hash::md5($data) . PHP_EOL;
        echo $hash::sha1($data) . PHP_EOL;
        echo $hash::sha256($data) . PHP_EOL;
        echo $hash::sha384($data) . PHP_EOL;
        echo $hash::sha512($data) . PHP_EOL;
        echo $hash->md5_file($file) . PHP_EOL;
        echo $hash->sha1_file($file) . PHP_EOL;
        echo $hash->sha256_file($file) . PHP_EOL;
        echo $hash->sha384_file($file) . PHP_EOL;
        echo $hash->sha512_file($file) . PHP_EOL;
        echo $hash::md5_file($file) . PHP_EOL;
        echo $hash::sha1_file($file) . PHP_EOL;
        echo $hash::sha256_file($file) . PHP_EOL;
        echo $hash::sha384_file($file) . PHP_EOL;
        echo $hash::sha512_file($file) . PHP_EOL;
        echo $hash->md5_equals($hash->md5($data), $data) . PHP_EOL;
        echo $hash->sha1_equals($hash->sha1($data), $data) . PHP_EOL;
        echo $hash->sha256_equals($hash->sha256($data), $data) . PHP_EOL;
        echo $hash->sha384_equals($hash->sha384($data), $data) . PHP_EOL;
        echo $hash->sha512_equals($hash->sha512($data), $data) . PHP_EOL;
        echo $hash::md5_equals($hash::md5($data), $data) . PHP_EOL;
        echo $hash::sha1_equals($hash::sha1($data), $data) . PHP_EOL;
        echo $hash::sha256_equals($hash::sha256($data), $data) . PHP_EOL;
        echo $hash::sha384_equals($hash::sha384($data), $data) . PHP_EOL;
        echo $hash::sha512_equals($hash::sha512($data), $data) . PHP_EOL;
        echo $hash->md5_file_equals($hash->md5_file($file), $file) . PHP_EOL;
        echo $hash->sha1_file_equals($hash->sha1_file($file), $file) . PHP_EOL;
        echo $hash->sha256_file_equals($hash->sha256_file($file), $file) . PHP_EOL;
        echo $hash->sha384_file_equals($hash->sha384_file($file), $file) . PHP_EOL;
        echo $hash->sha512_file_equals($hash->sha512_file($file), $file) . PHP_EOL;
        echo $hash::md5_file_equals($hash::md5_file($file), $file) . PHP_EOL;
        echo $hash::sha1_file_equals($hash::sha1_file($file), $file) . PHP_EOL;
        echo $hash::sha256_file_equals($hash::sha256_file($file), $file) . PHP_EOL;
        echo $hash::sha384_file_equals($hash::sha384_file($file), $file) . PHP_EOL;
        echo $hash::sha512_file_equals($hash::sha512_file($file), $file) . PHP_EOL;

        echo $hash->md5($data, $key) . PHP_EOL;
        echo $hash->sha1($data, $key) . PHP_EOL;
        echo $hash->sha256($data, $key) . PHP_EOL;
        echo $hash->sha384($data, $key) . PHP_EOL;
        echo $hash->sha512($data, $key) . PHP_EOL;
        echo $hash::md5($data, $key) . PHP_EOL;
        echo $hash::sha1($data, $key) . PHP_EOL;
        echo $hash::sha256($data, $key) . PHP_EOL;
        echo $hash::sha384($data, $key) . PHP_EOL;
        echo $hash::sha512($data, $key) . PHP_EOL;
        echo $hash->md5_file($file, $key) . PHP_EOL;
        echo $hash->sha1_file($file, $key) . PHP_EOL;
        echo $hash->sha256_file($file, $key) . PHP_EOL;
        echo $hash->sha384_file($file, $key) . PHP_EOL;
        echo $hash->sha512_file($file, $key) . PHP_EOL;
        echo $hash::md5_file($file, $key) . PHP_EOL;
        echo $hash::sha1_file($file, $key) . PHP_EOL;
        echo $hash::sha256_file($file, $key) . PHP_EOL;
        echo $hash::sha384_file($file, $key) . PHP_EOL;
        echo $hash::sha512_file($file, $key) . PHP_EOL;
        echo $hash->md5_equals($hash->md5($data, $key), $data, $key) . PHP_EOL;
        echo $hash->sha1_equals($hash->sha1($data, $key), $data, $key) . PHP_EOL;
        echo $hash->sha256_equals($hash->sha256($data, $key), $data, $key) . PHP_EOL;
        echo $hash->sha384_equals($hash->sha384($data, $key), $data, $key) . PHP_EOL;
        echo $hash->sha512_equals($hash->sha512($data, $key), $data, $key) . PHP_EOL;
        echo $hash::md5_equals($hash::md5($data, $key), $data, $key) . PHP_EOL;
        echo $hash::sha1_equals($hash::sha1($data, $key), $data, $key) . PHP_EOL;
        echo $hash::sha256_equals($hash::sha256($data, $key), $data, $key) . PHP_EOL;
        echo $hash::sha384_equals($hash::sha384($data, $key), $data, $key) . PHP_EOL;
        echo $hash::sha512_equals($hash::sha512($data, $key), $data, $key) . PHP_EOL;
        echo $hash->md5_file_equals($hash->md5_file($file, $key), $file, $key) . PHP_EOL;
        echo $hash->sha1_file_equals($hash->sha1_file($file, $key), $file, $key) . PHP_EOL;
        echo $hash->sha256_file_equals($hash->sha256_file($file, $key), $file, $key) . PHP_EOL;
        echo $hash->sha384_file_equals($hash->sha384_file($file, $key), $file, $key) . PHP_EOL;
        echo $hash->sha512_file_equals($hash->sha512_file($file, $key), $file, $key) . PHP_EOL;
        echo $hash::md5_file_equals($hash::md5_file($file, $key), $file, $key) . PHP_EOL;
        echo $hash::sha1_file_equals($hash::sha1_file($file, $key), $file, $key) . PHP_EOL;
        echo $hash::sha256_file_equals($hash::sha256_file($file, $key), $file, $key) . PHP_EOL;
        echo $hash::sha384_file_equals($hash::sha384_file($file, $key), $file, $key) . PHP_EOL;
        echo $hash::sha512_file_equals($hash::sha512_file($file, $key), $file, $key) . PHP_EOL;
    }
}
