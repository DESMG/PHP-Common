<?php

namespace DESMG\RFC8942;

readonly class RequestHeader
{
    public function __construct(
        private string $clientVersion,
        private int    $linuxVersion,
        private int    $fedoraVersion,
        private int    $minChromeVersion,
    )
    {
    }

    public function getCURLHeaders(): array
    {
        $clientVersion = $this->clientVersion;
        $linuxVersion = $this->linuxVersion;
        $fedoraVersion = $this->fedoraVersion;

        $clientVersionShort = explode('.', $clientVersion)[0];
        $chromeVersion = $this->minChromeVersion;
        $protocted = 'User_Agent_Protected_By_Client_Hints (https://web.dev/user-agent-client-hints/)';
        [$notABrand, $notABrandFull] = $this->generateNotABrand();
        $sec_ch_ua = [
            sprintf('"Google Chrome";v="%s"', $chromeVersion),
            sprintf('"Chromium";v="%s"', $chromeVersion),
            sprintf('"DESMG Web Client";v="%s"', $clientVersionShort),
            $notABrand,
        ];
        $sec_ch_ua_full_version_list = [
            sprintf('"Google Chrome";v="%s.0.0.0"', $chromeVersion),
            sprintf('"Chromium";v="%s.0.0.0"', $chromeVersion),
            sprintf('"DESMG Web Client";v="%s"', $clientVersion),
            $notABrandFull,
        ];
        shuffle($sec_ch_ua);
        shuffle($sec_ch_ua_full_version_list);
        $sec_ch_ua = implode(', ', $sec_ch_ua);
        $sec_ch_ua_full_version_list = implode(', ', $sec_ch_ua_full_version_list);
        return [
            'Accept-Encoding' => 'gzip',
            'Accept-Language' => 'zh-CN,zh;q=0.9,en-US;q=0.8,en;q=0.7',
            'Cache-Control' => 'no-cache',
            'Pragma' => 'no-cache',
            'Sec-CH-UA' => $sec_ch_ua,
            'Sec-CH-UA-Arch' => 'x86',
            'Sec-CH-UA-Bitness' => '64',
            'Sec-CH-UA-Full-Version-List' => $sec_ch_ua_full_version_list,
            'Sec-CH-UA-Mobile' => '?0',
            'Sec-CH-UA-Platform' => 'Fedora',
            'Sec-CH-UA-Platform-Version' => $fedoraVersion,
            'Sec-CH-UA-WoW64' => '?0',
            'Sec-CH-Viewport-Width' => '2560',
            'Sec-CH-Width' => '2560',
            'Sec-Fetch-Dest' => 'document',
            'Sec-Fetch-Mode' => 'navigate',
            'Sec-Fetch-Site' => 'none',
            'Sec-Fetch-User' => '?1',
            'Upgrade-Insecure-Requests' => '1',
            'User-Agent' => "$protocted Linux/$linuxVersion Fedora/$fedoraVersion IA64 x86_64 Chrome/$chromeVersion.0.0.0 DESMG-Web-Client/$clientVersion",
        ];
    }

    public function generateNotABrand(): array
    {
        $notABrand = ['', 'Not', '', 'A', '', 'Brand', '',];
        $characters = str_split(
            str_repeat(':', 10) .
            str_repeat(')', 20) .
            str_repeat('(', 30) .
            str_repeat(';', 40) .
            str_repeat(' ', 50)
        );
        shuffle($characters);
        foreach ([0, 2, 4, 6] as $index) {
            $randomCharacter = $characters[array_rand($characters)];
            $notABrand[$index] = $randomCharacter;
        }
        $result = implode($notABrand);
        $result = trim($result);
        /** @noinspection PhpUnhandledExceptionInspection */
        $v = random_int(1, 99);
        /** @noinspection PhpUnhandledExceptionInspection */
        $v2 = random_int(1, 99) . '.' . random_int(1, 99);
        return ["\"$result\";v=\"$v\"", "\"$result\";v=\"$v2\""];
    }
}
