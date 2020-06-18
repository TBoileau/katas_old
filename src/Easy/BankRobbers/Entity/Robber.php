<?php

namespace TBoileau\CodinGame\Easy\BankRobbers\Entity;

/**
 * Class Robber
 * @package TBoileau\CodinGame\Easy\BankRobbers\Entity
 */
class Robber
{
    /**
     * @var Vault[]
     */
    private $vaults = [];

    /**
     * @var int
     */
    private $totalSeconds = 0;

    public function workOn(Vault $vault): void
    {
        $this->vaults[] = $vault;
        $this->totalSeconds += $vault->numberOfSecondsToCrackVault();
    }

    /**
     * @return int
     */
    public function getTotalSeconds(): int
    {
        return $this->totalSeconds;
    }

    /**
     * @return Vault[]
     */
    public function getVaults(): array
    {
        return $this->vaults;
    }

    /**
     * @return Vault
     */
    public function getLastVault(): Vault
    {
        return $this->vaults[count($this->vaults) - 1];
    }
}
