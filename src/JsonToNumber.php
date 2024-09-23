<?php
declare(strict_types=1);

namespace OLPS\Money;

final class JsonToNumber
{
    use FormatMoneyTrait;

    public function __invoke(string $json): float
    {
        $money = (new JsonToMoney)($json);

        return (float) $this->formatToNumeric($money);
    }
}
