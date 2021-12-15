<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Medium\WinamaxBattle\UseCase;

use TBoileau\CodinGame\Medium\WinamaxBattle\Comparator\CardComparatorInterface;
use TBoileau\CodinGame\Medium\WinamaxBattle\Entity\Player;
use TBoileau\CodinGame\Medium\WinamaxBattle\Entity\Round;
use TBoileau\CodinGame\Medium\WinamaxBattle\ValueObject\Winner;

final class IdentifyWinner
{
    public function __construct(private CardComparatorInterface $cardComparator)
    {
    }

    public function __invoke(Player $playerOne, Player $playerTwo): ?Winner
    {
        /** @var array<array-key, Round> $rounds */
        $rounds = [];

        while (count($playerOne->deck) > 0 && count($playerTwo->deck) > 0) {
            $round = Round::create($playerOne, $playerTwo);

            $round->fight($this->cardComparator);

            $rounds[] = $round;
        }

        if ($round->isFinished() && $playerOne->deck->count() === 0 && $playerTwo->deck->count() > 0) {
            return Winner::create($playerTwo, count($rounds));
        } elseif ($round->isFinished() && $playerTwo->deck->count() === 0 && $playerOne->deck->count() > 0) {
            return Winner::create($playerOne, count($rounds));
        }

        return null;
    }
}
