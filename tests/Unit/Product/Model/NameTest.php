<?php

declare(strict_types=1);

namespace App\Tests\Unit\Product\Model;

use App\Product\Model\Exception\MaximumCharacterLimitExceededException;
use App\Product\Model\Name;
use PHPUnit\Framework\TestCase;

class NameTest extends TestCase
{
    /**
    * @test
    */
    public function it_should_create_name_with_invalidate_name_length(): void
    {
        $this->expectException(MaximumCharacterLimitExceededException::class);

        new Name('some invalid length some invalid length some invalid length some invalid length');
    }

    /**
    * @test
    */
    public function it_should_create_name_with_valid_name_length(): void
    {
        $value = 'someName';
        $name = new Name($value);
        self::assertInstanceOf(Name::class, $name);
    }

    /**
    * @test
    */
    public function it_should_get_name(): void
    {
        $value = 'someName';
        $name = new Name($value);

        self::assertEquals($value, $name->value());
    }
}
