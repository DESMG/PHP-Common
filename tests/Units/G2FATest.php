<?php

namespace Tests\Units;

use DESMG\RFC6238\Google;

class G2FATest
{
    public function testG2FA(): void
    {
        $key = Google::generateKey();
        echo $key . PHP_EOL;
        $timeStamp = Google::getTimestamp();
        $totp = Google::getPass($key, $timeStamp);
        echo $totp . PHP_EOL;
        $verify = Google::verify($key, $totp) ? 'success' : 'fail';
        echo $verify . PHP_EOL;
    }
}