<?php
declare(strict_types=1);

namespace IamPersistent\Money\Interactor;

final class JsonToString
{
    public function __invoke(string $json): string
    {
        $money = json_decode($json, true);

        return sprintf("%01.2f", ((int) $money['amount']) / 100);
    }
}
