<?php

namespace Tests\Units;

use DESMG\Unicode\Emoji;

class CountryEmojiTest
{
    public function testCountryEmoji(): void
    {
        echo 'T1: ' . Emoji::fromCountryCode('T1'), PHP_EOL; // 🌐
        echo 'CN: ' . Emoji::fromCountryCode('CN'), PHP_EOL; // 🇨🇳
        echo 'US: ' . Emoji::fromCountryCode('US'), PHP_EOL; // 🇺🇸
        echo 'FR: ' . Emoji::fromCountryCode('FR'), PHP_EOL; // 🇫🇷
        echo 'GB: ' . Emoji::fromCountryCode('GB'), PHP_EOL; // 🇬🇧
        echo 'RU: ' . Emoji::fromCountryCode('RU'), PHP_EOL; // 🇷🇺
        echo 'EU: ' . Emoji::fromCountryCode('EU'), PHP_EOL; // 🇪🇺
        echo 'NL: ' . Emoji::fromCountryCode('NL'), PHP_EOL; // 🇳🇱
        echo 'JP: ' . Emoji::fromCountryCode('JP'), PHP_EOL; // 🇯🇵
        echo 'TW: ' . Emoji::fromCountryCode('TW'), PHP_EOL; // 🇹🇼
        echo 'HK: ' . Emoji::fromCountryCode('HK'), PHP_EOL; // 🇭🇰
        echo 'MO: ' . Emoji::fromCountryCode('MO'), PHP_EOL; // 🇲🇴

        echo Emoji::fromCountryCode('T1') === '🌐' ? 'true' : 'false', PHP_EOL; // true
        echo Emoji::fromCountryCode('CN') === '🇨🇳' ? 'true' : 'false', PHP_EOL; // true
        echo Emoji::fromCountryCode('US') === '🇺🇸' ? 'true' : 'false', PHP_EOL; // true
        echo Emoji::fromCountryCode('FR') === '🇫🇷' ? 'true' : 'false', PHP_EOL; // true
        echo Emoji::fromCountryCode('GB') === '🇬🇧' ? 'true' : 'false', PHP_EOL; // true
        echo Emoji::fromCountryCode('RU') === '🇷🇺' ? 'true' : 'false', PHP_EOL; // true
        echo Emoji::fromCountryCode('EU') === '🇪🇺' ? 'true' : 'false', PHP_EOL; // true
        echo Emoji::fromCountryCode('NL') === '🇳🇱' ? 'true' : 'false', PHP_EOL; // true
        echo Emoji::fromCountryCode('JP') === '🇯🇵' ? 'true' : 'false', PHP_EOL; // true
        echo Emoji::fromCountryCode('TW') === '🇹🇼' ? 'true' : 'false', PHP_EOL; // true
        echo Emoji::fromCountryCode('HK') === '🇭🇰' ? 'true' : 'false', PHP_EOL; // true
        echo Emoji::fromCountryCode('MO') === '🇲🇴' ? 'true' : 'false', PHP_EOL; // true

        echo 'AF: ' . Emoji::fromCountryCode('AA', 'AF'), PHP_EOL; // 🌍
        echo 'EU: ' . Emoji::fromCountryCode('AA', 'EU'), PHP_EOL; // 🌍
        echo 'NA: ' . Emoji::fromCountryCode('AA', 'NA'), PHP_EOL; // 🌎
        echo 'SA: ' . Emoji::fromCountryCode('AA', 'SA'), PHP_EOL; // 🌎
        echo 'AS: ' . Emoji::fromCountryCode('AA', 'AS'), PHP_EOL; // 🌏
        echo 'OC: ' . Emoji::fromCountryCode('AA', 'OC'), PHP_EOL; // 🌏

        echo Emoji::fromCountryCode('AA', 'AF') === '🌍' ? 'true' : 'false', PHP_EOL; // true
        echo Emoji::fromCountryCode('AA', 'EU') === '🌍' ? 'true' : 'false', PHP_EOL; // true
        echo Emoji::fromCountryCode('AA', 'NA') === '🌍' ? 'true' : 'false', PHP_EOL; // false
        echo Emoji::fromCountryCode('AA', 'SA') === '🌍' ? 'true' : 'false', PHP_EOL; // false
        echo Emoji::fromCountryCode('AA', 'AS') === '🌍' ? 'true' : 'false', PHP_EOL; // false
        echo Emoji::fromCountryCode('AA', 'OC') === '🌍' ? 'true' : 'false', PHP_EOL; // false
    }
}
