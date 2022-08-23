<?php
declare(strict_types=1);

namespace IamPersistent\Money\Interactor;

use Money\Currency;
use Money\Money;

final class NumberToMoney
{
    public function __invoke($amount): Money
    {
        $money = new Money($amount,  new Currency('USD'));

        return $money->multiply(100);
    }
}
