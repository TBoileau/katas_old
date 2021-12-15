<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Medium\WinamaxBattle\ValueObject;

final class Card
{
    private function __construct(private string $card)
    {
    }

    public static function create(string $card): Card
    {
        return new self($card);
    }

    public function getValue(): string
    {
        return substr($this->card, 0 , strlen($this->card) - 1);
    }
}
