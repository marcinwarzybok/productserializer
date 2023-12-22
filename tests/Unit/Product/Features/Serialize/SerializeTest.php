<?php

declare(strict_types=1);

namespace App\Tests\Unit\Product\Features\Serialize;

use App\Product\Model\Name;
use App\Product\Model\Product;
use App\Shared\Application\Features\Serialize\Format;
use App\Shared\Application\Features\Serialize\Serialize;
use App\Shared\Application\Features\Serialize\Serializer;
use App\Tests\Unit\Product\TestFixtures\MoneyFixture;
use PHPUnit\Framework\TestCase;

class SerializeTest extends TestCase
{
    /**
    * @test
    */
    public function it_should_serialize_products(): void
    {
        $products = [new Product(new Name('someName'), MoneyFixture::create())];
        $symfonySerializer = $this->createMock(Serializer::class);
        $expected = 'someXml';
        $symfonySerializer
            ->expects(self::once())
            ->method('execute')
            ->with(Format::XML, $products)
            ->willReturn($expected);
        $testedClass = new Serialize($symfonySerializer);

        $result = $testedClass->execute(Format::XML, $products);

        self::assertEquals($expected, $result);
    }
}
