<?php

namespace TBoileau\CodinGame\Easy\GhostLegs\Context;

use Assert\Assertion;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
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
     * @var int
     */
    private $width;

    /**
     * @var int
     */
    private $height;

    /**
     * @var array
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
     * @Given a player want to play to ghost legs that is :width wide and :height high
     * @param int $width
     * @param int $height
     */
    public function playerWantToPlay(int $width, int $height): void
    {
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * @When he chooses a line in:
     * @param PyStringNode $diagram
     */
    public function playerChooseALineIn(PyStringNode $diagram): void
    {
        $this->diagram = $diagram;
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
            $this->findConnectedPairs->execute()
        );
    }
}
