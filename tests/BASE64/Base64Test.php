<?php

namespace Tests\BASE64;

use DESMG\BASE64\Base64;
use PHPUnit\Framework\TestCase;

class Base64Test extends TestCase
{
    public function testUrldecode()
    {
        $decoded = Base64::urldecode('REUyMDI0MDUxMTEwMDI0OTUwOTgzM0ZGMjcyNTgwNjI2QzAxOEMyQzI2Qzc2Q0YyNkZGODY2MzVEQUI3QjkyOA');
        $this->assertEquals('DE20240511100249509833FF272580626C018C2C26C76CF26FF86635DAB7B928', $decoded);
        $decoded = base64_decode('REUyMDI0MDUxMTEwMDI0OTUwOTgzM0ZGMjcyNTgwNjI2QzAxOEMyQzI2Qzc2Q0YyNkZGODY2MzVEQUI3QjkyOA==');
        $this->assertEquals('DE20240511100249509833FF272580626C018C2C26C76CF26FF86635DAB7B928', $decoded);
    }

    public function testUrlencode()
    {
        $encoded = base64_encode('DE20240511100249509833FF272580626C018C2C26C76CF26FF86635DAB7B928');
        $this->assertEquals('REUyMDI0MDUxMTEwMDI0OTUwOTgzM0ZGMjcyNTgwNjI2QzAxOEMyQzI2Qzc2Q0YyNkZGODY2MzVEQUI3QjkyOA==', $encoded);
        $encoded = Base64::urlencode('DE20240511100249509833FF272580626C018C2C26C76CF26FF86635DAB7B928');
        $this->assertEquals('REUyMDI0MDUxMTEwMDI0OTUwOTgzM0ZGMjcyNTgwNjI2QzAxOEMyQzI2Qzc2Q0YyNkZGODY2MzVEQUI3QjkyOA', $encoded);
    }
}
