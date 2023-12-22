<?php

declare(strict_types=1);

namespace App\Tests\Unit\Product\TestFixtures;

use App\Product\Model\Currency;
use App\Product\Model\Money;
use App\Product\Model\Precision;
use App\Product\Model\Price;

final class MoneyFixture
{
    public const PRICE = 12312;
    public const CURRENCY = Currency::PLN;
    public const PRECISION = 23;

    public static function create(): Money
    {
        return new Money(self::CURRENCY, new Price(self::PRICE), new Precision(self::PRECISION));
    }
}
