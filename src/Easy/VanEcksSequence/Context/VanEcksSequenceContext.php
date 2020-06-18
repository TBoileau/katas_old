<?php

namespace TBoileau\CodinGame\Easy\VanEcksSequence\Context;

use Assert\Assertion;
use Behat\Behat\Context\Context;
use TBoileau\CodinGame\Easy\VanEcksSequence\Entity\Sequence;
use TBoileau\CodinGame\Easy\VanEcksSequence\UseCase\FindNumberInSequence;

/**
 * Class VanEcksSequenceContext
 * @package TBoileau\CodinGame\Easy\VanEcksSequence\Context
 */
class VanEcksSequenceContext implements Context
{
    /**
     * @var FindNumberInSequence
     */
    private $findNumberInSequence;

    /**
     * @var int
     */
    private $start;

    /**
     * @var
     */
    private $position;

    /**
     * VanEcksSequenceContext constructor.
     */
    public function __construct()
    {
        $this->findNumberInSequence = new FindNumberInSequence();
    }

    /**
     * @Given I start with :start
     * @param int $start
     */
    public function iStartWith(int $start): void
    {
        $this->start = $start;
    }

    /**
     * @When I've got the :position position of number that I need to find
     * @param int $position
     */
    public function iHaveGotThePosition(int $position): void
    {
        $this->position = $position;
    }

    /**
     * @Then I must find :number
     * @param int $number
     * @throws \Assert\AssertionFailedException
     */
    public function iMustFind(int $number): void
    {
        Assertion::eq(
            $number,
            $this->findNumberInSequence->execute(
                new Sequence($this->start),
                $this->position
            )
        );
    }
}
