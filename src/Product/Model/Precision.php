<?php

declare(strict_types=1);

namespace App\Product\Model;

use App\Shared\Model\ValueObject;

final class Precision implements ValueObject
{
    private int $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }
}
