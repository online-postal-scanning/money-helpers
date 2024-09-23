<?php

declare(strict_types=1);

namespace Tests\Unit\OLPS\Money;

use Money\Currency;
use Money\Money;
use OLPS\Money\NumberToMoney;
use PHPUnit\Framework\TestCase;

class NumberToMoneyTest extends TestCase
{
    private NumberToMoney $numberToMoney;

    protected function setUp(): void
    {
        $this->numberToMoney = new NumberToMoney();
    }

    public function testInvokeWithPositiveAmount()
    {
        $result = ($this->numberToMoney)(10, 'USD');
        $this->assertEquals('1000', $result->getAmount());
        $this->assertEquals('USD', $result->getCurrency()->getCode());
    }

    public function testInvokeWithNegativeAmount()
    {
        $result = ($this->numberToMoney)("-5.00", 'EUR');
        $this->assertInstanceOf(Money::class, $result);
        $this->assertEquals('-500', $result->getAmount());
        $this->assertEquals('EUR', $result->getCurrency()->getCode());
    }

    public function testInvokeWithZeroAmount()
    {
        $result = ($this->numberToMoney)(0, 'JPY');
        $this->assertInstanceOf(Money::class, $result);
        $this->assertEquals('0', $result->getAmount());
        $this->assertEquals('JPY', $result->getCurrency()->getCode());
    }

    public function testInvokeWithDifferentSubunits()
    {
        // Test with currency that has 2 subunits (e.g., USD)
        $resultUSD = ($this->numberToMoney)(10.50, 'USD');
        $this->assertEquals('1050', $resultUSD->getAmount());

        // Test with currency that has 0 subunits (e.g., JPY)
        $resultJPY = ($this->numberToMoney)(1000, 'JPY');
        $this->assertEquals('1000', $resultJPY->getAmount());

        // Test with currency that has 3 subunits (e.g., BHD - Bahraini Dinar)
        $resultBHD = ($this->numberToMoney)(10.005, 'BHD');
        $this->assertEquals('10005', $resultBHD->getAmount());
    }
}
