<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Medium\WinamaxBattle\Entity;

use TBoileau\CodinGame\Medium\WinamaxBattle\ValueObject\Card;

final class Deck implements \Countable, \Iterator
{
    private int $position = 0;

    /**
     * @var array<int, Card> $cards
     */
    private function __construct(private array $cards = [])
    {
    }

    /**
     * @param array<int, Card> $cards
     */
    public static function create(array $cards): Deck
    {
        return new self($cards);
    }

    public function add(...$cards): void
    {
        $this->cards = array_merge($this->cards, $cards);
    }

    public function current(): Card
    {
        return $this->cards[$this->position];
    }

    public function next(): void
    {
        $this->position++;
    }

    public function key(): int
    {
        return $this->position;
    }

    public function valid(): bool
    {
        return isset($this->cards[$this->position]);
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function count(): int
    {
        return count($this->cards);
    }

    public function shift(): Card
    {
        $card = array_shift($this->cards);
        $this->rewind();
        return $card;
    }

    public function slice(int $offset, ?int $length = null): Deck
    {
        $deck = self::create(array_slice($this->cards, $offset, $length));

        $this->cards = array_slice($this->cards, $offset + $length);

        $this->rewind();

        return $deck;
    }

    public function merge(Deck $deck): void
    {
        $this->cards = array_merge($this->cards, $deck->cards);
        $this->rewind();
    }
}
