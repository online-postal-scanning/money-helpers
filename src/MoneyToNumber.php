<?php
declare(strict_types=1);

namespace OLPS\Money;

use Money\Money;

final class MoneyToNumber
{
    public function __invoke(Money $money): int
    {
        $json = $money->jsonSerialize();

        return (int) ((int) $json['amount'] / 100);
    }
}
