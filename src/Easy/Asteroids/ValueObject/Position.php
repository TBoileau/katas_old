<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Easy\Asteroids\ValueObject;

final class Position
{
    private function __construct(public int $y, public int $x)
    {
    }

    public static function create(int $y, int $x): Position
    {
        return new self($y, $x);
    }
}
