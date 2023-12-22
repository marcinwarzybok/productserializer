<?php

declare(strict_types=1);

namespace App\Tests\Unit\Product\Model;

use App\Product\Model\Price;
use PHPUnit\Framework\TestCase;

class PriceTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_get_value(): void
    {
        $value = 3;
        $name = new Price($value);

        self::assertEquals($value, $name->value());
    }
}
