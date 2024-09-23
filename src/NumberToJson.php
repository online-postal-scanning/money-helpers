<?php
declare(strict_types=1);

namespace OLPS\Money;

use IamPersistent\Ledger\Interactor\DBal\MoneyToJson;

final class NumberToJson
{
    public function __invoke($number)
    {
        $money = (new NumberToMoney)($number);

        return (new MoneyToJson)($money);
    }
}
