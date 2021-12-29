<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Easy\EquivalentResistanceCircuitBuilding\UseCase;

use TBoileau\CodinGame\Easy\EquivalentResistanceCircuitBuilding\Entity\Resistor;
use TBoileau\CodinGame\Easy\EquivalentResistanceCircuitBuilding\Factory\CircuitFactoryInterface;
use TBoileau\CodinGame\Easy\EquivalentResistanceCircuitBuilding\ValueObject\Resistance;

class CalculateEquivalentResistanceOfCircuit
{
    public function __construct(private CircuitFactoryInterface $circuitFactory)
    {
    }

    /**
     * @param array<array-key, Resistor> $resistors
     * @param string $circuit
     * @return float
     */
    public function execute(array $resistors, string $circuit): float
    {
        /** @var array<int, string> $resistorNames */
        $resistorNames = array_map(static fn (Resistor $resistor) => $resistor->name, $resistors);

        $resistors = array_combine(
            array_map(
                static fn (int $key) => chr(65 + $key),
                array_keys($resistorNames)
            ),
            $resistors
        );

        $circuit = str_replace(
            array_merge($resistorNames, [' ']),
            array_merge(array_keys($resistors), ['']),
            $circuit
        );

        $partTypes = ['(' => ')', '[' => ']'];

        while (strlen($circuit) > 1) {
            $parts = str_split($circuit);

            $partType = null;

            foreach ($parts as $part) {
                if ($part === '(' || $part === '[') {
                    $partType = $part;
                    $subCircuit = '';
                }

                if ($partType !== null) {
                    $subCircuit .= $part;
                }

                if ($partType !== null && $part === $partTypes[$partType]) {
                    $newCircuit = $this->circuitFactory->createFromString($subCircuit, $resistors);

                    $resistorName = chr(65 + count($resistors));

                    $resistors[$resistorName] = Resistor::create(
                        $resistorName,
                        Resistance::create($newCircuit->calculate())
                    );
                    $circuit = str_replace($subCircuit, $resistorName, $circuit);
                    $partType = null;
                }
            }
        }

        return $resistors[$circuit]->resistance->value;
    }
}
