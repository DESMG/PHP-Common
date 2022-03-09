<?php declare(strict_types=1);

namespace Tests\RFC6986;

use DESMG\RFC6986\Hash;
use PHPUnit\Framework\TestCase;

class HashTest extends TestCase
{
    const string DATA = '123456';
    const string KEY = '123456';
    const string FILE = __FILE__;

    public function testMd5()
    {
        $this->assertEquals(Hash::md5(self::DATA), Hash::md5(self::DATA));
        $this->assertEquals(32, strlen(Hash::md5(self::DATA)));
    }

    public function testMd5_equals()
    {
        $this->assertTrue(
            Hash::md5_equals(
                Hash::md5(self::DATA),
                self::DATA
            )
        );
    }

    public function testMd5_file()
    {
        $this->assertEquals(Hash::md5_file(self::FILE), Hash::md5_file(self::FILE));
        $this->assertEquals(32, strlen(Hash::md5_file(self::FILE)));
    }

    public function testMd5_file_equals()
    {
        $this->assertTrue(
            Hash::md5_file_equals(
                Hash::md5_file(self::FILE),
                self::FILE
            )
        );
    }

    public function testSha1()
    {
        $this->assertEquals(Hash::sha1(self::DATA), Hash::sha1(self::DATA));
        $this->assertEquals(40, strlen(Hash::sha1(self::DATA)));
    }

    public function testSha1_equals()
    {
        $this->assertTrue(
            Hash::sha1_equals(
                Hash::sha1(self::DATA),
                self::DATA
            )
        );
    }

    public function testSha1_file()
    {
        $this->assertEquals(Hash::sha1_file(self::FILE), Hash::sha1_file(self::FILE));
        $this->assertEquals(40, strlen(Hash::sha1_file(self::FILE)));
    }

    public function testSha1_file_equals()
    {
        $this->assertTrue(
            Hash::sha1_file_equals(
                Hash::sha1_file(self::FILE),
                self::FILE
            )
        );
    }

    public function testSha256()
    {
        $this->assertEquals(Hash::sha256(self::DATA), Hash::sha256(self::DATA));
        $this->assertEquals(64, strlen(Hash::sha256(self::DATA)));
    }

    public function testSha256_equals()
    {
        $this->assertTrue(
            Hash::sha256_equals(
                Hash::sha256(self::DATA),
                self::DATA
            )
        );
    }

    public function testSha256_file()
    {
        $this->assertEquals(Hash::sha256_file(self::FILE), Hash::sha256_file(self::FILE));
        $this->assertEquals(64, strlen(Hash::sha256_file(self::FILE)));
    }

    public function testSha256_file_equals()
    {
        $this->assertTrue(
            Hash::sha256_file_equals(
                Hash::sha256_file(self::FILE),
                self::FILE
            )
        );
    }

    public function testSha384()
    {
        $this->assertEquals(Hash::sha384(self::DATA), Hash::sha384(self::DATA));
        $this->assertEquals(96, strlen(Hash::sha384(self::DATA)));
    }

    public function testSha384_equals()
    {
        $this->assertTrue(
            Hash::sha384_equals(
                Hash::sha384(self::DATA),
                self::DATA
            )
        );
    }

    public function testSha384_file()
    {
        $this->assertEquals(Hash::sha384_file(self::FILE), Hash::sha384_file(self::FILE));
        $this->assertEquals(96, strlen(Hash::sha384_file(self::FILE)));
    }

    public function testSha384_file_equals()
    {
        $this->assertTrue(
            Hash::sha384_file_equals(
                Hash::sha384_file(self::FILE),
                self::FILE
            )
        );
    }

    public function testSha512()
    {
        $this->assertEquals(Hash::sha512(self::DATA), Hash::sha512(self::DATA));
        $this->assertEquals(128, strlen(Hash::sha512(self::DATA)));
    }

    public function testSha512_equals()
    {
        $this->assertTrue(
            Hash::sha512_equals(
                Hash::sha512(self::DATA),
                self::DATA
            )
        );
    }

    public function testSha512_file()
    {
        $this->assertEquals(Hash::sha512_file(self::FILE), Hash::sha512_file(self::FILE));
        $this->assertEquals(128, strlen(Hash::sha512_file(self::FILE)));
    }

    public function testSha512_file_equals()
    {
        $this->assertTrue(
            Hash::sha512_file_equals(
                Hash::sha512_file(self::FILE),
                self::FILE
            )
        );
    }
}
