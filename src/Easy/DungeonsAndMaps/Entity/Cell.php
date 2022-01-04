<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Easy\DungeonsAndMaps\Entity;

use TBoileau\CodinGame\Easy\DungeonsAndMaps\ValueObject\Coordinate;
use TBoileau\CodinGame\Easy\DungeonsAndMaps\ValueObject\Direction;

abstract class Cell
{
    protected function __construct(public Coordinate $coordinate)
    {
    }

    public static function create(Coordinate $coordinate, string $str): Cell
    {
        return match ($str) {
            "." => new Trap($coordinate),
            "#" => new Wall($coordinate),
            "T" => new Treasure($coordinate),
            default => new Action($coordinate, Direction::create($str))
        };
    }
}
