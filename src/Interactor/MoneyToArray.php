<?php
declare(strict_types=1);

namespace IamPersistent\Money\Interactor;

use Money\Money;

final class MoneyToArray
{
    public function __invoke(Money $money): string
    {
        return [
            'amount'   => (int)$money->getAmount(),
            'currency' => $money->getCurrency(),
        ];
    }
}
