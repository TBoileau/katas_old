<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Medium\WinamaxBattle\UseCase;

use TBoileau\CodinGame\Medium\WinamaxBattle\Entity\Player;
use TBoileau\CodinGame\Medium\WinamaxBattle\ValueObject\Winner;

interface IdentifyWinnerInterface
{
    public function __invoke(Player $playerOne, Player $playerTwo): ?Winner;
}
