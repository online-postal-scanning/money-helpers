<?php

declare(strict_types=1);

namespace OLPS\Money;

trait JsonDecodeTrait
{
    public function decode(string $json): array
    {
        $data = json_decode($json, true);

        if (!isset($data['amount']) ||!isset($data['currency'])) {
            throw new \JsonException('Amount and currency must be provided in the JSON data.');
        }

        return [
            'amount'   => (int)$data['amount'],
            'currency' => $data['currency'],
        ];
    }
}
