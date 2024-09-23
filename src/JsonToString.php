<?php
declare(strict_types=1);

namespace OLPS\Money;

final class JsonToString
{
    public function __invoke(string $json): string
    {
        return (new JsonToNumber)($json);
    }
}
