<?php
declare(strict_types=1);

namespace IamPersistent\Money\Interactor;

use Money\Currency;
use Money\Money;

final class NumberToMoney
{
    public function __invoke($amount): Money
    {
        return new Money($amount * 100,  new Currency('USD'));
    }
}
