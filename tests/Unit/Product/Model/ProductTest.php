<?php

namespace App\Tests\Unit\Product\Model;

use App\Product\Model\Currency;
use App\Product\Model\Money;
use App\Product\Model\Name;
use App\Product\Model\Precision;
use App\Product\Model\Price;
use App\Product\Model\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /**
    * @test
    */
    public function it_should_get_name(): void
    {
        $name = new Name('someName');
        $testedClass = new Product($name, $this->getExampleMoney());

        self::assertSame($name, $testedClass->getName());
    }

    /**
     * @test
     */
    public function it_should_get_price(): void
    {
        $expected = $this->getExampleMoney();
        $testedClass = new Product(new Name('someName'), $expected);

        self::assertSame($expected, $testedClass->getMoney());
    }

    /**
     * @return Money
     */
    private function getExampleMoney(): Money
    {
        return new Money(Currency::PLN, new Price(12312), new Precision(23));
    }
}
