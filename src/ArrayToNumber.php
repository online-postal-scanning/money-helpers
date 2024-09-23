<?php
declare(strict_types=1);

namespace OLPS\Money;

use Money\Currency;
use Money\Money;

final class ArrayToNumber
{
    use FormatMoneyTrait;

    public function __invoke(array $money): float
    {
        $money = new Money($money['amount'], new Currency($money['currency']));

        return (float) $this->formatToNumeric($money);
    }
}
