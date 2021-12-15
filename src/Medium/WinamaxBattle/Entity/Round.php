<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Medium\WinamaxBattle\Entity;

use TBoileau\CodinGame\Medium\WinamaxBattle\Comparator\CardComparatorInterface;

final class Round
{
    private ?Battle $battle = null;

    private function __construct(private Player $playerOne, private Player $playerTwo)
    {
    }

    public static function create(Player $playerOne, Player $playerTwo): Round
    {
        return new self($playerOne, $playerTwo);
    }

    public function fight(CardComparatorInterface $cardComparator): void
    {
        do {
            $cardOne = $this->playerOne->deck->shift();
            $cardTwo = $this->playerTwo->deck->shift();

            $winner = match($cardComparator->compare($cardOne, $cardTwo)) {
                $cardOne => $this->playerOne,
                $cardTwo => $this->playerTwo,
                default => null
            };

            if ($this->battle !== null) {
                $this->battle->add($cardOne, $cardTwo);
            }
            
            if ($winner !== null) {
                if ($this->battle !== null) {
                    $this->battle->end($winner);
                    $this->battle = null;
                } else {
                    $winner->deck->add($cardOne);
                    $winner->deck->add($cardTwo);
                }
            } else {
                if ($this->battle === null) {
                    $this->battle = Battle::create($cardOne, $cardTwo);
                }
                $this->battle->discard($this->playerOne, $this->playerTwo);
            }
        } while ($this->battle !== null && $this->playerOne->deck->count() > 0 && $this->playerTwo->deck->count() > 0);
    }

    public function isFinished(): bool
    {
        return $this->battle === null;
    }
}
