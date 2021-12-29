<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Easy\EquivalentResistanceCircuitBuilding\Context;

use Assert\Assertion;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;
use TBoileau\CodinGame\Easy\EquivalentResistanceCircuitBuilding\Entity\Parallel;
use TBoileau\CodinGame\Easy\EquivalentResistanceCircuitBuilding\Entity\Resistor;
use TBoileau\CodinGame\Easy\EquivalentResistanceCircuitBuilding\Entity\Serie;
use TBoileau\CodinGame\Easy\EquivalentResistanceCircuitBuilding\Factory\CircuitFactory;
use TBoileau\CodinGame\Easy\EquivalentResistanceCircuitBuilding\UseCase\CalculateEquivalentResistanceOfCircuit;
use TBoileau\CodinGame\Easy\EquivalentResistanceCircuitBuilding\ValueObject\Resistance;

class EquivalentResistanceCircuitBuildingContext implements Context
{
    /**
     * @var array<array-key, Resistor>
     */
    private array $resistors = [];

    private string $circuit;

    /**
     * @Given /^we need to calculate the total of resistors$/
     */
    public function weNeedToCalculateTheTotalOfResistors()
    {
    }

    /**
     * @When /^we have a list of resistors :$/
     */
    public function weHaveAListOfResistors(TableNode $table)
    {
        foreach ($table->getIterator() as $resistor) {
            $this->resistors[] = Resistor::create(
                $resistor['name'],
                Resistance::create(intval($resistor['resistance']))
            );
        }
    }

    /**
     * @Given /^the circuit is (.+)$/
     */
    public function theCircuitIs(string $circuit)
    {
        $this->circuit = $circuit;
    }

    /**
     * @Then /^the equivalent resistance is ([0-9.]+) Ohms$/
     */
    public function theEquivalentResistanceIsOhms(float $total)
    {
        $useCase = new CalculateEquivalentResistanceOfCircuit(
            new CircuitFactory(
                [
                    Serie::class,
                    Parallel::class
                ]
            )
        );

        Assertion::eq(
            $total,
            $useCase->execute($this->resistors, $this->circuit)
        );
    }
}
