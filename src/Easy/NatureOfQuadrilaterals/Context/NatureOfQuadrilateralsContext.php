<?php

namespace TBoileau\CodinGame\Easy\NatureOfQuadrilaterals\Context;

use Assert\Assertion;
use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use TBoileau\CodinGame\Easy\NatureOfQuadrilaterals\Entity\Point;
use TBoileau\CodinGame\Easy\NatureOfQuadrilaterals\Entity\Quadrilateral;
use TBoileau\CodinGame\Easy\NatureOfQuadrilaterals\UseCase\DetermineNatureOfQuadrilateral;

/**
 * Class NatureOfQuadrilateralsContext
 * @package TBoileau\CodinGame\Easy\NatureOfQuadrilaterals\Context
 */
class NatureOfQuadrilateralsContext implements Context
{
    /**
     * @var DetermineNatureOfQuadrilateral
     */
    private DetermineNatureOfQuadrilateral $useCase;

    /**
     * @var Quadrilateral
     */
    private Quadrilateral $quadrilateral;

    /**
     * @Given /^we have to print the nature of the quadrilaterals$/
     */
    public function weHaveToPrintTheNatureOfTheQuadrilaterals()
    {
        $this->useCase = new DetermineNatureOfQuadrilateral();
        $this->quadrilateral = new Quadrilateral();
    }

    /**
     * @When /^([A-Z]{1}) is in ([-]?\d+),([-]?\d+)$/
     * @param string $letter
     * @param int $x
     * @param int $y
     */
    public function isIn(string $letter, int $x, int $y)
    {
        $this->quadrilateral->add(new Point($letter, $x, $y));
    }

    /**
     * @Then /^we have a ([a-z]+)$/
     * @param string $nature
     */
    public function weHaveAQuadrilateral(string $nature)
    {
        Assertion::eq($this->useCase->execute($this->quadrilateral), $nature);
    }
}
