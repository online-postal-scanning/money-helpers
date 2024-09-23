<?php
declare(strict_types=1);

namespace Tests\Unit\OLPS\Money;

use Money\Money;
use OLPS\Money\ArrayToMoney;
use PHPUnit\Framework\TestCase;

class ArrayToMoneyTest extends TestCase
{
    private ArrayToMoney $arrayToMoney;

    protected function setUp(): void
    {
        $this->arrayToMoney = new ArrayToMoney();
    }

    public function testInvokeWithPositiveAmount()
    {
        $input = [
            'amount' => '1000',
            'currency' => 'USD'
        ];

        $result = ($this->arrayToMoney)($input);

        $this->assertInstanceOf(Money::class, $result);
        $this->assertEquals('1000', $result->getAmount());
        $this->assertEquals('USD', $result->getCurrency()->getCode());
    }

    public function testInvokeWithNegativeAmount()
    {
        $input = [
            'amount' => '-500',
            'currency' => 'EUR'
        ];

        $result = ($this->arrayToMoney)($input);

        $this->assertInstanceOf(Money::class, $result);
        $this->assertEquals('-500', $result->getAmount());
        $this->assertEquals('EUR', $result->getCurrency()->getCode());
    }

    public function testInvokeWithZeroAmount()
    {
        $input = [
            'amount' => '0',
            'currency' => 'JPY'
        ];

        $result = ($this->arrayToMoney)($input);

        $this->assertInstanceOf(Money::class, $result);
        $this->assertEquals('0', $result->getAmount());
        $this->assertEquals('JPY', $result->getCurrency()->getCode());
    }

    public function testInvokeWithMissingAmount()
    {
        $this->expectException(\TypeError::class);

        $input = [
            'currency' => 'USD'
        ];

        ($this->arrayToMoney)($input);
    }

    public function testInvokeWithMissingCurrency()
    {
        $this->expectException(\TypeError::class);

        $input = [
            'amount' => '1000'
        ];

        ($this->arrayToMoney)($input);
    }
}
