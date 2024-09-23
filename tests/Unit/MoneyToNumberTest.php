<?php

declare(strict_types=1);

namespace Tests\Unit\OLPS\Money;

use Money\Currency;
use Money\Money;
use OLPS\Money\MoneyToNumber;
use PHPUnit\Framework\TestCase;

class MoneyToNumberTest extends TestCase
{
    private MoneyToNumber $moneyToNumber;

    protected function setUp(): void
    {
        $this->moneyToNumber = new MoneyToNumber();
    }

    public function testInvokeWithPositiveAmount()
    {
        $money = new Money(1000, new Currency('USD'));
        $result = ($this->moneyToNumber)($money);
        $this->assertEquals(10.00, $result);
    }

    public function testInvokeWithNegativeAmount()
    {
        $money = new Money(-500, new Currency('EUR'));
        $result = ($this->moneyToNumber)($money);
        $this->assertEquals(-5.00, $result);
    }

    public function testInvokeWithZeroAmount()
    {
        $money = new Money(0, new Currency('JPY'));
        $result = ($this->moneyToNumber)($money);
        $this->assertEquals(0.00, $result);
    }
}
