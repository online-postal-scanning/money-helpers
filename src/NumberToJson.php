<?php
declare(strict_types=1);

namespace OLPS\Money;

final class NumberToJson
{
    public function __invoke($number, string $currency = 'USD'): string
    {
        $money = (new NumberToMoney)($number, $currency);

        return (new MoneyToJson)($money);
    }
}
