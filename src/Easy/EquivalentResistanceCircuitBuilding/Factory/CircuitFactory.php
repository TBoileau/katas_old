<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Easy\EquivalentResistanceCircuitBuilding\Factory;

use TBoileau\CodinGame\Easy\EquivalentResistanceCircuitBuilding\Entity\Circuit;
use TBoileau\CodinGame\Easy\EquivalentResistanceCircuitBuilding\Entity\Resistor;

final class CircuitFactory implements CircuitFactoryInterface
{
    /**
     * @param array<array-key, class-string<Circuit>> $circuits
     */
    public function __construct(private array $circuits)
    {
    }

    /**
     * @param array<array-key, Resistor> $resistors
     */
    public function createFromString(string $circuit, array $resistors): Circuit
    {
        foreach ($this->circuits as $circuitClass) {
            if (substr($circuit, 0, 1) === $circuitClass::getNotation()) {
                $parts = str_split(substr($circuit, 1, strlen($circuit) - 2));

                return new $circuitClass(
                    array_map(
                        fn (string $key) => $resistors[$key],
                        $parts
                    )
                );
            }
        }

        throw new \Exception('Circuit not found !');
    }
}
