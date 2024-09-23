<?php
declare(strict_types=1);

namespace OLPS\Money;

use Money\Currency;
use Money\Money;

final class ArrayToMoney
{
    public function __invoke(array $money): Money
    {
        return new Money($money['amount'], new Currency($money['currency']));
    }
}
