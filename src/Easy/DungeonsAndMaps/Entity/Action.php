<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Easy\DungeonsAndMaps\Entity;

use TBoileau\CodinGame\Easy\DungeonsAndMaps\ValueObject\Coordinate;
use TBoileau\CodinGame\Easy\DungeonsAndMaps\ValueObject\Direction;

final class Action extends Cell
{
    public function __construct(public Coordinate $coordinate, public Direction $direction)
    {
    }
}
