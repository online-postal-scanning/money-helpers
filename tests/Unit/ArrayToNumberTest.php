<?php

declare(strict_types=1);

namespace Tests\Unit\OLPS\Money;

use OLPS\Money\ArrayToNumber;
use PHPUnit\Framework\TestCase;

final class ArrayToNumberTest extends TestCase
{
    private ArrayToNumber $arrayToNumber;

    protected function setUp(): void
    {
        $this->arrayToNumber = new ArrayToNumber();
    }

    public function testInvokeWithPositiveAmount()
    {
        $input = [
            'amount'   => '1000',
            'currency' => 'USD',
        ];
        $result = ($this->arrayToNumber)($input);
        $this->assertEquals(10.0, $result);
    }

    public function testInvokeWithNegativeAmount()
    {
        $input = [
            'amount'   => '-500',
            'currency' => 'USD',
        ];
        $result = ($this->arrayToNumber)($input);
        $this->assertEquals(-5.00, $result);
    }

    public function testInvokeWithZeroAmount()
    {
        $input = [
            'amount'   => '0',
            'currency' => 'USD',
        ];
        $result = ($this->arrayToNumber)($input);
        $this->assertEquals(0.00, $result);
    }

    public function testInvokeWithMissingAmount()
    {
        $this->expectException(\TypeError::class);
        $input = [];
        ($this->arrayToNumber)($input);
    }

    public function testInvokeWithMissingCurrency()
    {
        $this->expectException(\TypeError::class);

        $input = [
            'amount' => '1000'
        ];

        ($this->arrayToNumber)($input);
    }
}
