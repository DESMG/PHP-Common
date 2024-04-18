<?php

namespace Tests\DESMG;

use DESMG\DESMG\Sensitive;
use PHPUnit\Framework\TestCase;

class SensitiveTest extends TestCase
{
    public function testSensitive(): void
    {
        $sensitiveData = '12345678901';
        [$plain, $hash, $payload] = Sensitive::encrypt($sensitiveData, 'DE20240611174828818480FFEE057E02028915CF9DDB52B6CCFD49725B6FB301');
        $this->assertEquals('F69EEC93ADCF9A1AA9DA9B0154C02C7F9B3F668ED4D0715F231E03545449AB920568AA12091BB2F2E6188E01851AE6BCF9005A8FCF2FD12F4F301A7AA1C2CE78', $hash);
        $this->assertEquals('123****8901', $plain);
        $this->assertEquals(72, strlen($payload));
        $plain = Sensitive::decrypt($plain, $payload, 'DE20240611174828818480FFEE057E02028915CF9DDB52B6CCFD49725B6FB301');
        $this->assertEquals($sensitiveData, $plain);
    }

    public function testSensitiveMb(): void
    {
        $sensitiveData = '你好世界';
        [$plain, $hash, $payload] = Sensitive::mb_encrypt($sensitiveData, 'DE20240611174828818480FFEE057E02028915CF9DDB52B6CCFD49725B6FB301');
        $this->assertEquals('4B28A152C8E203EBB52E099301041E3CF704A56190D3097EC8B086A0F9BFB4B9D533CE71FC3BCF374359E506DC5F17322EC3911EAC8DD8F5B35308D938BA0C26', $hash);
        $this->assertEquals('你**界', $plain);
        $this->assertEquals(76, strlen($payload));
        $plain = Sensitive::mb_decrypt($plain, $payload, 'DE20240611174828818480FFEE057E02028915CF9DDB52B6CCFD49725B6FB301');
        $this->assertEquals($sensitiveData, $plain);
    }
}
