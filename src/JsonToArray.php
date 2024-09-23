<?php
declare(strict_types=1);

namespace OLPS\Money;

use Money\Currency;
use Money\Money;

final class JsonToArray
{
    use JsonDecodeTrait;

    public function __invoke(string $json): array
    {
        return $this->decode($json);
    }
}
