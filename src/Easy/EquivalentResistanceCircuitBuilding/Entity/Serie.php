<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Easy\EquivalentResistanceCircuitBuilding\Entity;

final class Serie extends Circuit
{
    public function calculate(): float
    {
        return array_sum(
            array_map(
                static fn (Resistor $resistor) => $resistor->resistance->value,
                $this->resistors
            )
        );
    }

    static function getNotation(): string
    {
        return '(';
    }
}
