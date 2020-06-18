<?php

namespace TBoileau\CodinGame\Easy\BankRobbers\Context;

use Assert\Assertion;
use Behat\Behat\Context\Context;
use TBoileau\CodinGame\Easy\BankRobbers\Entity\Robber;
use TBoileau\CodinGame\Easy\BankRobbers\Entity\Vault;
use TBoileau\CodinGame\Easy\BankRobbers\UseCase\Heist;

/**
 * Class HeistContext
 * @package TBoileau\CodinGame\Easy\BankRobbers\Context
 */
class HeistContext implements Context
{
    /**
     * @var Heist
     */
    private $heist;

    /**
     * @var Robber[]
     */
    private $robbers = [];

    /**
     * @var Vault[]
     */
    private $vaults = [];

    /**
     * HeistContext constructor.
     */
    public function __construct()
    {
        $this->heist = new Heist();
    }

    /**
     * @Given A gang of :robbers foolish robbers decides to heist a bank
     * @param int $robbers
     */
    public function gangOfRobbers(int $robbers): void
    {
        for ($i = 0; $i < $robbers; $i++) {
            $this->robbers[] = new Robber();
        }
    }

    /**
     * @When /^robbers have managed to extract the following combinations (.+)/
     * @param string $combinations
     */
    public function extractCombinations(string $combinations): void
    {
        foreach(explode(";", $combinations) as $combination) {
            $this->vaults[] = new Vault(...explode(",", $combination));
        }
    }

    /**
     * @Then they heist the bank in :seconds seconds
     * @param int $seconds
     * @throws \Assert\AssertionFailedException
     */
    public function heistBank(int $seconds): void
    {
        Assertion::eq($seconds, $this->heist->execute($this->robbers, $this->vaults));
    }
}
