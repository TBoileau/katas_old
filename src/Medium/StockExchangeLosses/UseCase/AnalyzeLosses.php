<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Medium\StockExchangeLosses\UseCase;

use TBoileau\CodinGame\Medium\StockExchangeLosses\Entity\Period;
use TBoileau\CodinGame\Medium\StockExchangeLosses\ValueObject\StockValue;

class AnalyzeLosses
{
    /**
     * @param array<array-key, StockValue> $stockValues
     * @return int
     */
    public function __invoke(array $stockValues): int
    {
        /** @var array<array-key, Period> $periods */
        $periods = [];

        $period = new Period();

        foreach ($stockValues as $stockValue) { // n
            if ($period->count() > 0 && $period->max->isSmallerThan($stockValue)) {
                $periods[] = $period;
                $period = new Period();
            }

            $period->add($stockValue);
        }

        if ($period->count() > 0) {
            $periods[] = $period;
        }

        $losses = array_map(static fn (Period $period) => $period->loss(), $periods);

        return min($losses);
    }
}
