<?php

declare(strict_types=1);

namespace Tests\Unit\OLPS\Money;

use JsonException;
use OLPS\Money\JsonToString;
use PHPUnit\Framework\TestCase;

class JsonToStringTest extends TestCase
{
    private JsonToString $jsonToString;

    protected function setUp(): void
    {
        $this->jsonToString = new JsonToString();
    }

    public function testInvokeWithValidJson()
    {
        $json = '{"amount": "1000", "currency": "USD"}';
        $result = ($this->jsonToString)($json);
        $this->assertEquals('10.00', $result);
    }

    public function testInvokeWithInvalidJson()
    {
        $this->expectException(JsonException::class);
        $json = '{invalid json}';
        ($this->jsonToString)($json);
    }

    public function testInvokeWithMissingAmount()
    {
        $this->expectException(\JsonException::class);
        $json = '{"currency": "USD"}';
        ($this->jsonToString)($json);
    }

    public function testInvokeWithNegativeAmount()
    {
        $json = '{"amount": "-500", "currency": "USD"}';
        $result = ($this->jsonToString)($json);
        $this->assertEquals('-5.00', $result);
    }

    public function testInvokeWithZeroAmount()
    {
        $json = '{"amount": "0", "currency": "USD"}';
        $result = ($this->jsonToString)($json);
        $this->assertEquals('0.00', $result);
    }
}
