<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Easy\EquivalentResistanceCircuitBuilding\Entity;

use TBoileau\CodinGame\Easy\EquivalentResistanceCircuitBuilding\ValueObject\Resistance;

final class Resistor
{
    private function __construct(public string $name, public Resistance $resistance)
    {
    }

    public static function create(string $name, Resistance $resistance): Resistor
    {
        return new self($name, $resistance);
    }
}
