<?php

namespace DESMG\RFC6986;

enum HashMethods: string
{
    case MD5 = 'md5';
    case SHA1 = 'sha1';
    case SHA256 = 'sha256';
    case SHA384 = 'sha384';
    case SHA512 = 'sha512';
    case MD5_FILE = 'md5_file';
    case SHA1_FILE = 'sha1_file';
    case SHA256_FILE = 'sha256_file';
    case SHA384_FILE = 'sha384_file';
    case SHA512_FILE = 'sha512_file';
}
