<?php
declare(strict_types=1);

namespace OLPS\Money;

use Money\Currency;
use Money\Money;

final class ArrayToNumber
{
    use FormatMoneyTrait;

    public function __invoke(array $money): string
    {
        $money = new Money($money['amount'], new Currency($money['currency']));

        return $this->formatToNumeric($money);
    }
}
