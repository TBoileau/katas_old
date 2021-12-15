<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Medium\WinamaxBattle\Entity;

final class Player
{
    public function __construct(public Deck $deck)
    {
    }

    public static function create(Deck $deck): Player
    {
        return new self($deck);
    }
}
