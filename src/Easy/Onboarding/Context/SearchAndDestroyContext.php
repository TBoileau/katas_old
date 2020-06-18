<?php

namespace TBoileau\CodinGame\Easy\Onboarding\Context;

use Assert\Assertion;
use Behat\Behat\Context\Context;
use TBoileau\CodinGame\Easy\BankRobbers\Entity\Robber;
use TBoileau\CodinGame\Easy\BankRobbers\Entity\Vault;
use TBoileau\CodinGame\Easy\BankRobbers\UseCase\Heist;
use TBoileau\CodinGame\Easy\Onboarding\Entity\Ship;
use TBoileau\CodinGame\Easy\Onboarding\UseCase\SearchAndDestroy;

/**
 * Class SearchAndDestroyContext
 * @package TBoileau\CodinGame\Easy\Onboarding\Context
 */
class SearchAndDestroyContext implements Context
{
    /**
     * @var Ship[]
     */
    private $ships = [];

    /**
     * @var SearchAndDestroy
     */
    private $searchAndDestroy;

    /**
     * HeistContext constructor.
     */
    public function __construct()
    {
        $this->searchAndDestroy = new SearchAndDestroy();
    }

    /**
     * @Given a cannon has to defend itself from attacking ships
     */
    public function cannonHasToDefend(): void
    {
    }

    /**
     * @When the :enemy ship at :dist meters
     * @param string $name
     * @param int $distance
     */
    public function enemyShipArrives(string $name, int $distance): void
    {
        $this->ships[] = new Ship($name, $distance);
    }

    /**
     * @Then the cannon need to destroy :ship because it's the closest one to him
     * @param string $ship
     * @throws \Assert\AssertionFailedException
     */
    public function targetAndDestroyTheClosestShip(string $ship): void
    {
        Assertion::eq($ship, $this->searchAndDestroy->execute($this->ships)->getName());
    }
}
