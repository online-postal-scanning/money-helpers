<?php
declare(strict_types=1);

namespace IamPersistent\Money\Interactor;

final class ArrayToNumber
{
    public function __invoke(array $money)
    {
        return ((int) $money['amount']) / 100;
    }
}
