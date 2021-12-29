<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Easy\EquivalentResistanceCircuitBuilding\Entity;

final class Parallel extends Circuit
{
    public function calculate(): float
    {
        return round(1 / (
             array_sum(
                array_map(
                    static fn (Resistor $resistor) => (1 / $resistor->resistance->value),
                    $this->resistors
                )
            )
        ), 1);
    }

    static function getNotation(): string
    {
        return '[';
    }
}
