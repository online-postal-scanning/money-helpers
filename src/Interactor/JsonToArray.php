<?php
declare(strict_types=1);

namespace IamPersistent\Money\Interactor;

use Money\Currency;
use Money\Money;

final class JsonToArray
{
    public function __invoke(string $json): array
    {
        $data = json_decode($json, true);

        return [
            'amount'   => (int)$data['amount'],
            'currency' => $data['currency'],
        ];
    }
}
