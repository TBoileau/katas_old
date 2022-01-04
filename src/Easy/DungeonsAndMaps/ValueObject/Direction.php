<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Easy\DungeonsAndMaps\ValueObject;

abstract class Direction
{
    abstract function next(Coordinate $coordinate): Coordinate;

    public static function create(string $str): Direction
    {
        return match ($str) {
            '>' => new Right(),
            '<' => new Left(),
            'v' => new Down(),
            default => new Up()
        };
    }
}
