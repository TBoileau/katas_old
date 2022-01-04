<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Easy\Asteroids\UseCase;

use TBoileau\CodinGame\Easy\Asteroids\Entity\Picture;
use TBoileau\CodinGame\Easy\Asteroids\ValueObject\Time;

final class DetermineFinalPicture
{
    public function execute(Picture $picture, Time $finalTime): void
    {
        $picture->determineFinalPicture($finalTime);
    }
}
