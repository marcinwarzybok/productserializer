<?php

declare(strict_types=1);

namespace App\Product\Model;

final class Product
{
    public function __construct(
        private readonly Name $name,
        private readonly Money $money
    ) {}

    public function getName(): Name
    {
        return $this->name;
    }

    public function getMoney(): Money
    {
        return $this->money;
    }
}
