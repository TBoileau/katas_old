<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Easy\DungeonsAndMaps\ValueObject;

final class Left extends Direction
{
    function next(Coordinate $coordinate): Coordinate
    {
        $coordinate = clone $coordinate;
        $coordinate->x--;
        return $coordinate;
    }
}
