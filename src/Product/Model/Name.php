<?php

declare(strict_types=1);

namespace App\Product\Model;

use App\Product\Model\Exception\MaximumCharacterLimitExceededException;
use App\Shared\Model\ValueObject;

final class Name implements ValueObject
{
    private const MAX_LENGTH_LIMIT = 50;

    private string $value;

    public function __construct(string $value)
    {
        if (strlen($value) > self::MAX_LENGTH_LIMIT) {
            throw new MaximumCharacterLimitExceededException();
        }

        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
