<?php

namespace DESMG\Unicode;

use DESMG\ISO3166\Alpha2\CountryCodes;
use InvalidArgumentException;
use Throwable;

final readonly class Emoji
{
    public static function fromCountryCode(string $countryCode = 'XX', ?string $continentCode = 'XX'): string
    {
        try {
            if (strlen($countryCode) !== 2 || !in_array($countryCode, CountryCodes::ISO_3166_1_ALPHA_2, true)) {
                throw new InvalidArgumentException('Invalid country code');
            }
            $firstLetter = dechex(ord(substr($countryCode, 0, 1)) - 0x41 + 0x1F1E6);
            $secondLetter = dechex(ord(substr($countryCode, 1, 1)) - 0x41 + 0x1F1E6);
            return mb_convert_encoding("&#x$firstLetter;", 'UTF-8', 'HTML-ENTITIES') . mb_convert_encoding("&#x$secondLetter;", 'UTF-8', 'HTML-ENTITIES');
        } catch (Throwable) {
            if ($countryCode === 'XX' || $continentCode === 'XX') {
                return mb_convert_encoding("&#x1F310;", 'UTF-8', 'HTML-ENTITIES');
            }
            if ($countryCode === 'T1' || $continentCode === 'T1') {
                return mb_convert_encoding("&#x1F310;", 'UTF-8', 'HTML-ENTITIES');
            }
            return match ($continentCode) {
                'AF', 'EU' => mb_convert_encoding("&#x1F30D;", 'UTF-8', 'HTML-ENTITIES'),
                'NA', 'SA' => mb_convert_encoding("&#x1F30E;", 'UTF-8', 'HTML-ENTITIES'),
                'AS', 'OC' => mb_convert_encoding("&#x1F30F;", 'UTF-8', 'HTML-ENTITIES'),
                default /** 'AN' is also included */ => mb_convert_encoding("&#x1F310;", 'UTF-8', 'HTML-ENTITIES'),
            };
        }
    }
}
