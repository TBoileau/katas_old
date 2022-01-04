<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Easy\DungeonsAndMaps\ValueObject;

final class Coordinate
{
    public function __construct(public int $y, public int $x)
    {
    }

    public static function create(int $y, int $x): Coordinate
    {
        return new self($y, $x);
    }

    public function next(Direction $direction): Coordinate
    {
        return $direction->next($this);
    }
}
