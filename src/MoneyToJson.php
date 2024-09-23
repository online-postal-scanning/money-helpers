<?php
declare(strict_types=1);

namespace OLPS\Money;

use Money\Money;

final class MoneyToJson
{
    public function __invoke(Money $money): string
    {
        $json = [
            'amount'   => (int)$money->getAmount(),
            'currency' => $money->getCurrency()->getCode(),
        ];

        return json_encode($json);
    }
}
