<?php
declare(strict_types=1);

namespace OLPS\Money;

use Money\Currency;
use Money\Money;

final class JsonToMoney
{
    use JsonDecodeTrait;

    public function __invoke(string $json): Money
    {
        $data = $this->decode($json);

        return new Money($data['amount'], new Currency($data['currency']));
    }
}
