<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Easy\DungeonsAndMaps\ValueObject;

final class Down extends Direction
{
    function next(Coordinate $coordinate): Coordinate
    {
        $coordinate = clone $coordinate;
        $coordinate->y++;
        return $coordinate;
    }
}
