<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Medium\WinamaxBattle\Comparator;

use TBoileau\CodinGame\Medium\WinamaxBattle\ValueObject\Card;

interface CardComparatorInterface
{
    public function compare(Card $cardOne, Card $cardTwo): ?Card;
}
