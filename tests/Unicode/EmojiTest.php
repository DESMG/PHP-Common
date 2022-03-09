<?php

namespace Tests\Unicode;

use DESMG\Unicode\Emoji;
use PHPUnit\Framework\TestCase;

final class EmojiTest extends TestCase
{
    public function testFromCountryCode(): void
    {
        $this->assertEquals('🌐', Emoji::fromCountryCode('T1'));
        $this->assertEquals('🇨🇳', Emoji::fromCountryCode('CN'));
        $this->assertEquals('🇺🇸', Emoji::fromCountryCode('US'));
        $this->assertEquals('🇫🇷', Emoji::fromCountryCode('FR'));
        $this->assertEquals('🇬🇧', Emoji::fromCountryCode('GB'));
        $this->assertEquals('🇷🇺', Emoji::fromCountryCode('RU'));
        $this->assertEquals('🇪🇺', Emoji::fromCountryCode('EU'));
        $this->assertEquals('🇳🇱', Emoji::fromCountryCode('NL'));
        $this->assertEquals('🇯🇵', Emoji::fromCountryCode('JP'));
        $this->assertEquals('🇹🇼', Emoji::fromCountryCode('TW'));
        $this->assertEquals('🇭🇰', Emoji::fromCountryCode('HK'));
        $this->assertEquals('🇲🇴', Emoji::fromCountryCode('MO'));
        $this->assertEquals('🌍', Emoji::fromCountryCode('AA', 'AF'));
        $this->assertEquals('🌍', Emoji::fromCountryCode('AA', 'EU'));
        $this->assertEquals('🌎', Emoji::fromCountryCode('AA', 'NA'));
        $this->assertEquals('🌎', Emoji::fromCountryCode('AA', 'SA'));
        $this->assertEquals('🌏', Emoji::fromCountryCode('AA', 'AS'));
        $this->assertEquals('🌏', Emoji::fromCountryCode('AA', 'OC'));
    }
}
