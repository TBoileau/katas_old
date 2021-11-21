<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Medium\StockExchangeLosses\ValueObject;

final class StockValue
{
    private function __construct(public int $value)
    {
    }

    public static function create(int $value): StockValue
    {
        return new StockValue($value);
    }

    public function isSmallerThan(StockValue $stockValue): bool
    {
        return $this->value < $stockValue->value;
    }

    public function isGreaterThan(StockValue $stockValue): bool
    {
        return $this->value > $stockValue->value;
    }

    public function diff(StockValue $stockValue): int
    {
        return $this->value - $stockValue->value;
    }
}
