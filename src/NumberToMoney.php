<?php
declare(strict_types=1);

namespace OLPS\Money;

use Money\Currency;
use Money\Money;

final class NumberToMoney
{
    public function __invoke($amount): Money
    {
        $amount *= 100;

        return new Money((int)$amount,  new Currency('USD'));
    }
}
