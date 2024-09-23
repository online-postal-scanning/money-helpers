<?php

declare(strict_types=1);

namespace Tests\Unit\OLPS\Money;

use OLPS\Money\NumberToJson;
use PHPUnit\Framework\TestCase;

class NumberToJsonTest extends TestCase
{
    private NumberToJson $numberToJson;

    protected function setUp(): void
    {
        $this->numberToJson = new NumberToJson();
    }
    public function testInvokeWithPositiveAmount()
    {
        $result = ($this->numberToJson)(10, 'USD');
        $this->assertEquals('{"amount":1000,"currency":"USD"}', $result);
    }

    public function testInvokeWithNegativeAmount()
    {
        $result = ($this->numberToJson)("-5.00", 'EUR');
        $this->assertEquals('{"amount":-500,"currency":"EUR"}', $result);
    }

    public function testInvokeWithZeroAmount()
    {
        $result = ($this->numberToJson)(0, 'JPY');
        $this->assertEquals('{"amount":0,"currency":"JPY"}', $result);
    }

    public function testInvokeWithDifferentSubunits()
    {
        $resultUSD = ($this->numberToJson)(10.50, 'USD');
        $this->assertEquals('{"amount":1050,"currency":"USD"}', $resultUSD);

        $resultJPY = ($this->numberToJson)(1000, 'JPY');
        $this->assertEquals('{"amount":1000,"currency":"JPY"}', $resultJPY);

        $resultBHD = ($this->numberToJson)(10.005, 'BHD');
        $this->assertEquals('{"amount":10005,"currency":"BHD"}', $resultBHD);
    }
}
