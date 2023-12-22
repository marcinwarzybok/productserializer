<?php

declare(strict_types=1);

namespace App\Tests\Unit\Product\Model;

use App\Product\Model\Precision;
use PHPUnit\Framework\TestCase;

class PrecisionTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_get_value(): void
    {
        $value = 3;
        $name = new Precision($value);

        self::assertEquals($value, $name->value());
    }
}
