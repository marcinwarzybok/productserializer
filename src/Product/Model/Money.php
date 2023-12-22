<?php

declare(strict_types=1);

namespace App\Product\Model;

final class Money
{
    public function __construct(
        private readonly Currency $currency,
        private readonly Price $price,
        private readonly Precision $precision
    ) {}

    public function add(Money $money): Money
    {
        if (!$this->isSameCurrency($money) || !$this->isSamePrecision($money)) {
            throw new \InvalidArgumentException('Cannot add price with non-consistent currency/precision');
        }

        return new self(
            $this->currency,
            new Price($this->price->value() + $money->price->value()),
            $this->precision
        );
    }

    public function equals(Money $money): bool
    {
        if (!$this->isSamePrice($money)) {
            return false;
        }

        if (!$this->isSameCurrency($money)) {
            return false;
        }

        if (!$this->isSamePrecision($money)) {
            return false;
        }

        return true;
    }

    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    public function getPrice(): Price
    {
        return $this->price;
    }

    public function getPrecision(): Precision
    {
        return $this->precision;
    }

    /**
     * @param Money $money
     * @return bool
     */
    private function isSameCurrency(Money $money): bool
    {
        return $this->currency === $money->currency;
    }

    /**
     * @param Money $money
     * @return bool
     */
    private function isSamePrecision(Money $money): bool
    {
        return $this->precision->value() === $money->precision->value();
    }

    /**
     * @param Money $money
     * @return bool
     */
    private function isSamePrice(Money $money): bool
    {
        return $this->price->value() === $money->price->value();
    }
}
