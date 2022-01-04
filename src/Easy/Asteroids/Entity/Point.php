<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Easy\Asteroids\Entity;

use TBoileau\CodinGame\Easy\Asteroids\ValueObject\Position;
use TBoileau\CodinGame\Easy\Asteroids\ValueObject\Time;

final class Point
{
    private function __construct(public Time $time, public Position $position)
    {
    }

    public static function create(Time $time, Position $position): Point
    {
        return new self($time, $position);
    }
}
