<?php
declare(strict_types=1);

namespace OLPS\Money;

use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Money;

final class NumberToMoney
{
    public function __invoke($amount, string $currency = 'USD'): Money
    {
        $currencies = new ISOCurrencies();
        $multiplier = (int) str_pad('1', $currencies->subunitFor(new Currency($currency)) + 1,'0', STR_PAD_RIGHT);
        $amount *= $multiplier;

        return new Money((int)$amount,  new Currency($currency));
    }
}
