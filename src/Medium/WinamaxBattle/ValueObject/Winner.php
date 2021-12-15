<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Medium\WinamaxBattle\ValueObject;

use TBoileau\CodinGame\Medium\WinamaxBattle\Entity\Player;

final class Winner
{
    private function __construct(public Player $winner, public int $rounds)
    {
    }

    public static function create(Player $winner, int $rounds): Winner
    {
        return new self($winner, $rounds);
    }
}
