<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Medium\WinamaxBattle\Comparator;

use TBoileau\CodinGame\Medium\WinamaxBattle\ValueObject\Card;

final class CardComparator implements CardComparatorInterface
{
    private const CARDS_ORDER = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];

    public function compare(Card $cardOne, Card $cardTwo): ?Card
    {
        $cardOneIndex = array_search($cardOne->getValue(), self::CARDS_ORDER);
        $cardTwoIndex = array_search($cardTwo->getValue(), self::CARDS_ORDER);

        return match(true) {
            $cardOneIndex > $cardTwoIndex => $cardOne,
            $cardOneIndex < $cardTwoIndex => $cardTwo,
            default => null
        };
    }
}
