<?php

namespace TBoileau\CodinGame\Easy\EquivalentResistanceCircuitBuilding\Factory;

use TBoileau\CodinGame\Easy\EquivalentResistanceCircuitBuilding\Entity\Circuit;
use TBoileau\CodinGame\Easy\EquivalentResistanceCircuitBuilding\Entity\Resistor;

interface CircuitFactoryInterface
{
    /**
     * @param array<array-key, Resistor> $resistors
     */
    public function createFromString(string $circuit, array $resistors): Circuit;
}
