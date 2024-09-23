<?php

declare(strict_types=1);

namespace Tests\Unit\OLPS\Money;

use OLPS\Money\JsonToArray;
use PHPUnit\Framework\TestCase;

final class JsonToArrayTest extends TestCase
{
    private JsonToArray $jsonToArray;

    protected function setUp(): void
    {
        $this->jsonToArray = new JsonToArray();
    }

    public function testInvokeWithValidJson()
    {
        $input = '{"amount": "1000", "currency": "USD"}';
        $result = ($this->jsonToArray)($input);
        $this->assertEquals(['amount' => '1000', 'currency' => 'USD'], $result);
    }

    public function testInvokeWithInvalidJson()
    {
        $this->expectException(\JsonException::class);
        $input = '{invalid json}';
        ($this->jsonToArray)($input);
    }

    public function testInvokeWithEmptyJson()
    {
        $this->expectException(\JsonException::class);
        $input = '{}';
        $result = ($this->jsonToArray)($input);
    }

    public function testInvokeWithMissingFields()
    {
        $this->expectException(\JsonException::class);
        $input = '{"amount": "1000"}';
        $result = ($this->jsonToArray)($input);
    }
}
