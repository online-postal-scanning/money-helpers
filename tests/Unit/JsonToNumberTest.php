<?php

declare(strict_types=1);

namespace Tests\Unit\OLPS\Money;

use JsonException;
use OLPS\Money\JsonToNumber;
use PHPUnit\Framework\TestCase;

class JsonToNumberTest extends TestCase
{
    private JsonToNumber $jsonToNumber;

    protected function setUp(): void
    {
        $this->jsonToNumber = new JsonToNumber();
    }

    public function testInvokeWithValidJson()
    {
        $json = '{"amount": "1000", "currency": "USD"}';
        $result = ($this->jsonToNumber)($json);
        $this->assertSame(10.00, $result);
    }

    public function testInvokeWithInvalidJson()
    {
        $this->expectException(JsonException::class);
        $json = '{invalid json}';
        ($this->jsonToNumber)($json);
    }

    public function testInvokeWithMissingAmount()
    {
        $this->expectException(\JsonException::class);
        $json = '{"currency": "USD"}';
        ($this->jsonToNumber)($json);
    }

    public function testInvokeWithNegativeAmount()
    {
        $json = '{"amount": "-500", "currency": "USD"}';
        $result = ($this->jsonToNumber)($json);
        $this->assertSame(-5.00, $result);
    }

    public function testInvokeWithZeroAmount()
    {
        $json = '{"amount": "0", "currency": "USD"}';
        $result = ($this->jsonToNumber)($json);
        $this->assertSame(0.00, $result);
    }
}
