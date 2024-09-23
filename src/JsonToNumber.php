<?php
declare(strict_types=1);

namespace OLPS\Money;

final class JsonToNumber
{
    use FormatMoneyTrait;

    public function __invoke(string $json): string
    {
        $money = (new JsonToMoney)($json);

        return $this->formatToNumeric($money);
    }
}
