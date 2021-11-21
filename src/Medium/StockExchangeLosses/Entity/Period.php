<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Medium\StockExchangeLosses\Entity;

use TBoileau\CodinGame\Medium\StockExchangeLosses\ValueObject\StockValue;

final class Period implements \Countable
{
    /**
     * @var array<array-key, StockValue>
     */
    private array $stockValues = [];

    public ?StockValue $max = null;

    public ?StockValue $min = null;

    public function add(StockValue $stockValue): void
    {
        if ($this->count() === 0 || $stockValue->isGreaterThan($this->max)) {
            $this->max = $stockValue;
        }

        if ($this->count() === 0 || $stockValue->isSmallerThan($this->min)) {
            $this->min = $stockValue;
        }

        $this->stockValues[] = $stockValue;
    }

    public function count(): int
    {
        return count($this->stockValues);
    }

    public function loss(): int
    {
        return -($this->max->diff($this->min));
    }
}
