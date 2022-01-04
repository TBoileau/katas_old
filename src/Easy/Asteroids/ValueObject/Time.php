<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Easy\Asteroids\ValueObject;

final class Time
{
    private function __construct(public int $time)
    {
    }

    public static function create(int $time): Time
    {
        return new self($time);
    }
}
