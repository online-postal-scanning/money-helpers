<?php
declare(strict_types=1);

namespace OLPS\Money;

use Money\Money;

final class MoneyToString
{
    use FormatMoneyTrait;

    public function __invoke(Money $money): string
    {
        return $this->formatToNumeric($money);
    }
}
