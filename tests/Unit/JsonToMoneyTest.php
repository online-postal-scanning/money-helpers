<?php

declare(strict_types=1);

namespace Tests\Unit\OLPS\Money;

use Money\Money;
use OLPS\Money\JsonToMoney;
use PHPUnit\Framework\TestCase;

final class JsonToMoneyTest extends TestCase
{
    private JsonToMoney $jsonToMoney;

    protected function setUp(): void
    {
        $this->jsonToMoney = new JsonToMoney();
    }

    public function testInvokeWithValidJson()
    {
        $json = '{"amount": "1000", "currency": "USD"}';
        $result = ($this->jsonToMoney)($json);
        $this->assertInstanceOf(Money::class, $result);
        $this->assertEquals('1000', $result->getAmount());
        $this->assertEquals('USD', $result->getCurrency()->getCode());
    }

    public function testInvokeWithInvalidJson()
    {
        $this->expectException(\JsonException::class);
        $json = '{invalid json}';
        ($this->jsonToMoney)($json);
    }

    public function testInvokeWithMissingAmount()
    {
        $this->expectException(\JsonException::class);
        $json = '{"currency": "USD"}';
        ($this->jsonToMoney)($json);
    }

    public function testInvokeWithMissingCurrency()
    {
        $this->expectException(\JsonException::class);
        $json = '{"amount": "1000"}';
        ($this->jsonToMoney)($json);
    }
}
