<?php
declare(strict_types=1);

namespace Tests\Unit\Money;

use IamPersistent\Money\Interactor\NumberToMoney;
use Money\Money;
use UnitTester;

class NumberToMoneyCest
{
    public function testInvoke(UnitTester $I)
    {
        $money = (new NumberToMoney)(200);

        $I->assertEquals(Money::USD(20000), $money);

        $money = (new NumberToMoney)(3.21);

        $I->assertEquals(Money::USD(321), $money);
    }
}
