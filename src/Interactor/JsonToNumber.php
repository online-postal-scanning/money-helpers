<?php
declare(strict_types=1);

namespace IamPersistent\Money\Interactor;

final class JsonToNumber
{
    public function __invoke(string $json): int
    {
        $money = json_decode($json, true);

        return (int) ((int) $money['amount'] / 100);
    }
}
