<?php
declare(strict_types=1);

namespace OLPS\Money;

use Money\Money;

final class MoneyToNumber
{
    use FormatMoneyTrait;

    public function __invoke(Money $money): float
    {
        return (float) $this->formatToNumeric($money);
    }
}
