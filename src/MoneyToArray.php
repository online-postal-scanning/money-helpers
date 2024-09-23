<?php
declare(strict_types=1);

namespace OLPS\Money;

use Money\Money;

final class MoneyToArray
{
    public function __invoke(Money $money): array
    {
        return [
            'amount'   => (int)$money->getAmount(),
            'currency' => $money->getCurrency()->getCode(),
        ];
    }
}
