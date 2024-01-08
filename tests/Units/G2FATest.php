<?php

namespace Tests\Units;

use DESMG\RFC6238\Google;

class G2FATest
{
    public function testG2FA(): void
    {
        $key = Google::generateKey();
        echo $key . PHP_EOL;

        $googles[] = Google::instance($key);
        $googles[] = Google::instance($key, 'sha1', 6, 2, 60);
        $googles[] = Google::instance($key, 'sha1', 6, 2, 60);
        $googles[] = Google::instance($key, 'sha1', 8);
        $googles[] = Google::instance($key, 'sha256');
        $googles[] = Google::instance($key, 'sha256', 8);
        $googles[] = Google::instance($key, 'sha512');
        $googles[] = Google::instance($key, 'sha512', 8);

        foreach ($googles as $google) {
            $totp = $google->getPass();
            echo $totp . PHP_EOL;
            $verify = $google->verifyTOTP($totp) ? 'success' : 'fail';
            echo $verify . PHP_EOL;
        }
    }
}
