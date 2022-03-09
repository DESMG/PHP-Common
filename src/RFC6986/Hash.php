<?php

namespace DESMG\RFC6986;

use InvalidArgumentException;

/**
 * @method string md5(string $data, string $key = '')
 * @method string sha1(string $data, string $key = '')
 * @method string sha256(string $data, string $key = '')
 * @method string sha384(string $data, string $key = '')
 * @method string sha512(string $data, string $key = '')
 * @method bool md5_equals(string $hash, string $data, string $key = '')
 * @method bool sha1_equals(string $hash, string $data, string $key = '')
 * @method bool sha256_equals(string $hash, string $data, string $key = '')
 * @method bool sha384_equals(string $hash, string $data, string $key = '')
 * @method bool sha512_equals(string $hash, string $data, string $key = '')
 * @method string md5_file(string $filename, string $key = '')
 * @method string sha1_file(string $filename, string $key = '')
 * @method string sha256_file(string $filename, string $key = '')
 * @method string sha384_file(string $filename, string $key = '')
 * @method string sha512_file(string $filename, string $key = '')
 * @method bool md5_file_equals(string $hash, string $filename, string $key = '')
 * @method bool sha1_file_equals(string $hash, string $filename, string $key = '')
 * @method bool sha256_file_equals(string $hash, string $filename, string $key = '')
 * @method bool sha384_file_equals(string $hash, string $filename, string $key = '')
 * @method bool sha512_file_equals(string $hash, string $filename, string $key = '')
 * @method static string md5(string $data, string $key = '')
 * @method static string sha1(string $data, string $key = '')
 * @method static string sha256(string $data, string $key = '')
 * @method static string sha384(string $data, string $key = '')
 * @method static string sha512(string $data, string $key = '')
 * @method static bool md5_equals(string $hash, string $data, string $key = '')
 * @method static bool sha1_equals(string $hash, string $data, string $key = '')
 * @method static bool sha256_equals(string $hash, string $data, string $key = '')
 * @method static bool sha384_equals(string $hash, string $data, string $key = '')
 * @method static bool sha512_equals(string $hash, string $data, string $key = '')
 * @method static string md5_file(string $filename, string $key = '')
 * @method static string sha1_file(string $filename, string $key = '')
 * @method static string sha256_file(string $filename, string $key = '')
 * @method static string sha384_file(string $filename, string $key = '')
 * @method static string sha512_file(string $filename, string $key = '')
 * @method static bool md5_file_equals(string $hash, string $filename, string $key = '')
 * @method static bool sha1_file_equals(string $hash, string $filename, string $key = '')
 * @method static bool sha256_file_equals(string $hash, string $filename, string $key = '')
 * @method static bool sha384_file_equals(string $hash, string $filename, string $key = '')
 * @method static bool sha512_file_equals(string $hash, string $filename, string $key = '')
 */
class Hash
{
    /**
     * @param string $name
     * @param array $arguments
     * @return bool|string
     */
    public static function __callStatic(string $name, array $arguments): bool|string
    {
        return (new self)->__call($name, $arguments);
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return bool|string
     */
    public function __call(string $name, array $arguments): bool|string
    {
        $names = explode('_', $name);
        $method = Hashs::tryFrom($names[0]) ?? throw new InvalidArgumentException('Missing argument #1 for ' . __CLASS__ . '::' . $name . '()');
        $isfile = str_contains($name, '_file');
        $equals = str_ends_with($name, '_equals');
        if ($equals) {
            $hash = $arguments[0] ?? throw new InvalidArgumentException('Missing argument #1 for ' . __CLASS__ . '::' . $name . '()');
            $data = $arguments[1] ?? throw new InvalidArgumentException('Missing argument #2 for ' . __CLASS__ . '::' . $name . '()');
            $key = $arguments[2] ?? '';
            return $this->equals($method, $isfile, $hash, $data, $key);
        } else {
            $data = $arguments[0] or throw new InvalidArgumentException('Missing argument #1 for ' . __CLASS__ . '::' . $name . '()');
            $key = $arguments[1] ?? '';
            return $this->hash($method, $isfile, $data, $key);
        }
    }

    /**
     * @param Hashs $method
     * @param bool $isfile
     * @param string $hash
     * @param string $data
     * @param string $key
     * @return bool
     */
    private function equals(Hashs $method, bool $isfile, string $hash, string $data, string $key): bool
    {
        return hash_equals(
            $hash,
            $this->hash($method, $isfile, $data, $key)
        );
    }

    /**
     * @param Hashs $method
     * @param bool $isfile
     * @param string $data
     * @param string $key
     * @return string
     */
    private function hash(Hashs $method, bool $isfile, string $data, string $key): string
    {
        return $isfile ?
            strtoupper(
                empty($key) ?
                    hash_file($method->value, $data) :
                    hash_hmac_file($method->value, $data, $key)
            ) :
            strtoupper(
                empty($key) ?
                    hash($method->value, $data) :
                    hash_hmac($method->value, $data, $key)
            );
    }
}
