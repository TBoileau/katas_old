<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Easy\EquivalentResistanceCircuitBuilding\ValueObject;

final class Resistance
{
    private function __construct(public float $value)
    {
    }

    public static function create(float $value): Resistance
    {
        return new self($value);
    }
}
