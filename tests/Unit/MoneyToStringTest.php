<?php

declare(strict_types=1);

namespace Tests\Unit\OLPS\Money;

use Money\Currency;
use Money\Money;
use OLPS\Money\MoneyToString;
use PHPUnit\Framework\TestCase;

class MoneyToStringTest extends TestCase
{
    private MoneyToString $moneyToString;

    protected function setUp(): void
    {
        $this->moneyToString = new MoneyToString();
    }

    public function testInvokeWithPositiveAmount()
    {
        $money = new Money(1000, new Currency('USD'));
        $result = ($this->moneyToString)($money);
        $this->assertEquals('10.00', $result);
    }

    public function testInvokeWithNegativeAmount()
    {
        $money = new Money(-500, new Currency('EUR'));
        $result = ($this->moneyToString)($money);
        $this->assertEquals('-5.00', $result);
    }

    public function testInvokeWithZeroAmount()
    {
        $money = new Money(0, new Currency('USD'));
        $result = ($this->moneyToString)($money);
        $this->assertEquals('0.00', $result);
    }
}
