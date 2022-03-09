<?php

namespace DESMG\RFC6986;

enum Hashs: string
{
    case MD5 = 'md5';
    case SHA1 = 'sha1';
    case SHA256 = 'sha256';
    case SHA384 = 'sha384';
    case SHA512 = 'sha512';
}
