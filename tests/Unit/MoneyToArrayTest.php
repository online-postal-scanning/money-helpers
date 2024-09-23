<?php

declare(strict_types=1);

namespace Tests\Unit\OLPS\Money;

use Money\Currency;
use Money\Money;
use OLPS\Money\MoneyToArray;
use PHPUnit\Framework\TestCase;

final class MoneyToArrayTest extends TestCase
{
    private MoneyToArray $moneyToArray;

    protected function setUp(): void
    {
        $this->moneyToArray = new MoneyToArray();
    }

    public function testInvokeWithPositiveAmount()
    {
        $money = new Money(1000, new Currency('USD'));
        $result = ($this->moneyToArray)($money);
        $this->assertEquals(['amount' => 1000, 'currency' => 'USD'], $result);
    }

    public function testInvokeWithNegativeAmount()
    {
        $money = new Money(-500, new Currency('EUR'));
        $result = ($this->moneyToArray)($money);
        $this->assertEquals(['amount' => -500, 'currency' => 'EUR'], $result);
    }

    public function testInvokeWithZeroAmount()
    {
        $money = new Money(0, new Currency('JPY'));
        $result = ($this->moneyToArray)($money);
        $this->assertEquals(['amount' => 0, 'currency' => 'JPY'], $result);
    }
}
