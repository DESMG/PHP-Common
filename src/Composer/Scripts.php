<?php

namespace DESMG\Composer;

class Scripts
{
    public static function postAutoloadDump(): void
    {
        echo "\033[38;5;214m";
        echo '  DESMG All Rights Reserved.' . PHP_EOL;
        echo '  - DESMG/PHP-Common Composer Project.' . PHP_EOL;
        echo '    - Please read this package\'s full codes to make sure our backwards-incompatible changes has no effect to you.' . PHP_EOL;
        echo "\033[0m";
    }
}
