<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Easy\EquivalentResistanceCircuitBuilding\Entity;

abstract class Circuit
{
    /**
     * @param array<array-key, Resistor> $resistors
     */
    public function __construct(protected array $resistors = [])
    {
    }

    abstract static function getNotation(): string;
}
