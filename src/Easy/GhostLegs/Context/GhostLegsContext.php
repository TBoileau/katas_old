<?php

namespace TBoileau\CodinGame\Easy\GhostLegs\Context;

use Assert\Assertion;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use TBoileau\CodinGame\Easy\GhostLegs\Entity\Diagram;
use TBoileau\CodinGame\Easy\GhostLegs\UseCase\FindConnectedPairs;

/**
 * Class GhostLegsContext
 * @package TBoileau\CodinGame\Easy\GhostLegs\Context
 */
class GhostLegsContext implements Context
{
    /**
     * @var FindConnectedPairs
     */
    private $findConnectedPairs;

    /**
     * @var Diagram
     */
    private $diagram;

    /**
     * GhostLegsContext constructor.
     */
    public function __construct()
    {
        $this->findConnectedPairs = new FindConnectedPairs();
    }

    /**
     * @Given a player want to play to ghost legs
     */
    public function playerWantToPlay(): void
    {
    }

    /**
     * @When he chooses a line in:
     * @param PyStringNode $diagram
     */
    public function playerChooseALineIn(PyStringNode $diagram): void
    {
        $this->diagram = Diagram::createFromArray($diagram->getStrings());
    }

    /**
     * @Then we need to check the following connected pairs:
     * @param PyStringNode $connectedPairs
     * @throws \Assert\AssertionFailedException
     */
    public function needToCheck(PyStringNode $connectedPairs): void
    {
        Assertion::eq(
            $connectedPairs->getStrings(),
            $this->findConnectedPairs->execute($this->diagram)
        );
    }
}
