<?php

namespace DESMG\RFC6986;

enum HashEqualMethods: string
{
    case MD5_EQUALS = 'md5_equals';
    case SHA1_EQUALS = 'sha1_equals';
    case SHA256_EQUALS = 'sha256_equals';
    case SHA384_EQUALS = 'sha384_equals';
    case SHA512_EQUALS = 'sha512_equals';
    case MD5_FILE_EQUALS = 'md5_file_equals';
    case SHA1_FILE_EQUALS = 'sha1_file_equals';
    case SHA256_FILE_EQUALS = 'sha256_file_equals';
    case SHA384_FILE_EQUALS = 'sha384_file_equals';
    case SHA512_FILE_EQUALS = 'sha512_file_equals';
}
