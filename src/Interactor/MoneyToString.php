<?php
declare(strict_types=1);

namespace IamPersistent\Money\Interactor;

use Money\Money;

final class MoneyToString
{
    public function __invoke(Money $money): string
    {
        $money = $money->jsonSerialize();

        return sprintf("%01.2f", ((int) $money['amount']) / 100);
    }
}
