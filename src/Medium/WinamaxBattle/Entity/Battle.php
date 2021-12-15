<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Medium\WinamaxBattle\Entity;

use TBoileau\CodinGame\Medium\WinamaxBattle\ValueObject\Card;

final class Battle
{
    private function __construct(private Deck $playerOneDeck, private Deck $playerTwoDeck)
    {
    }

    public static function create(Card $playerOneCard, Card $playerTwoCard): Battle
    {
        return new Battle(
            Deck::create([$playerOneCard]),
            Deck::create([$playerTwoCard])
        );
    }

    public function add(Card $playerOneCard, Card $playerTwoCard): void
    {
        $this->playerOneDeck->add($playerOneCard);
        $this->playerTwoDeck->add($playerTwoCard);
    }

    public function discard(Player $playerOne, Player $playerTwo): void
    {
        $this->playerOneDeck->add(...$playerOne->deck->slice(0, 3));
        $this->playerTwoDeck->add(...$playerTwo->deck->slice(0, 3));
    }

    public function end(Player $player): void
    {
        $player->deck->merge($this->playerOneDeck);
        $player->deck->merge($this->playerTwoDeck);
    }
}
