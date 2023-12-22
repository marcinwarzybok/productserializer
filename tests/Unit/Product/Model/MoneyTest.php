<?php

declare(strict_types=1);

namespace App\Tests\Unit\Product\Model;

use App\Product\Model\Currency;
use App\Product\Model\Money;
use App\Product\Model\Precision;
use App\Product\Model\Price;
use App\Tests\Unit\Product\TestFixtures\MoneyFixture;
use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{
    /**
    * @test
    */
    public function it_should_throw_exception_for_add_inconsistent_currency(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $precision = new Precision(4);
        $moneyPln = new Money(Currency::PLN, new Price(234), $precision);
        $moneyUsd = new Money(Currency::USD, new Price(234), $precision);

        $moneyUsd->add($moneyPln);
    }

    /**
     * @test
     */
    public function it_should_throw_exception_for_add_inconsistent_precision(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $moneyWithPrecision2 = new Money(Currency::PLN, new Price(234), new Precision(2));
        $moneyWithPrecision4 = new Money(Currency::USD, new Price(234), new Precision(2));

        $moneyWithPrecision2->add($moneyWithPrecision4);

        $this->expectException(\InvalidArgumentException::class);
    }
    
    /**
    * @test
    */
    public function it_should_add_money(): void
    {
        $money = MoneyFixture::create();
        $newMoney = $money->add($money);

        self::assertSame(MoneyFixture::PRICE * 2, $newMoney->getPrice()->value());
    }

    /**
    * @test
    */
    public function it_should_get_currency(): void
    {
        $money = MoneyFixture::create();

        self::assertSame(MoneyFixture::CURRENCY, $money->getCurrency());
    }

    /**
    * @test
    */
    public function it_should_get_price(): void
    {
        $money = MoneyFixture::create();

        self::assertSame(MoneyFixture::PRICE, $money->getPrice()->value());
    }

    /**
    * @test
    */
    public function it_should_get_precision(): void
    {
        $money = MoneyFixture::create();

        self::assertSame(MoneyFixture::PRECISION, $money->getPrecision()->value());
    }

    /**
    * @test
    */
    public function it_should_check_equals_with_same_values(): void
    {
        self::assertTrue(MoneyFixture::create()->equals(MoneyFixture::create()));
    }

    /**
    * @test
    */
    public function it_should_check_equals_with_different_values(): void
    {
        $money = new Money(
            MoneyFixture::CURRENCY, new Price(MoneyFixture::PRICE), new Precision(MoneyFixture::PRECISION)
        );

        self::assertFalse($money->equals(
            new Money(
                Currency::USD, new Price(MoneyFixture::PRICE), new Precision(MoneyFixture::PRECISION)
            )
        ));
        self::assertFalse($money->equals(
            new Money(
                Currency::PLN, new Price(8768767), new Precision(MoneyFixture::PRECISION)
            )
        ));
        self::assertFalse($money->equals(
            new Money(
                Currency::PLN, new Price(MoneyFixture::PRICE), new Precision(2)
            )
        ));
    }
}
