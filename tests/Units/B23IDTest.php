<?php

namespace Tests\Units;

use DESMG\BASE58\B23ID;

class B23IDTest
{
    public function testB23ID(): void
    {
        for ($i = 2_251_799_813_685_248; $i > 2_251_799_813_681_248; $i--) {
            $code = B23ID::AV2BV($i);
            $id = B23ID::BV2AV($code);
            echo "id: $i, code: $code, id: $id\n";
        }
    }
}
