<?php

namespace TBoileau\CodinGame\Easy\BankRobbers\UseCase;

use TBoileau\CodinGame\Easy\BankRobbers\Entity\Robber;
use TBoileau\CodinGame\Easy\BankRobbers\Entity\Vault;

/**
 * Class Heist
 * @package TBoileau\CodinGame\Easy\BankRobbers\UseCase
 */
class Heist
{
    /**
     * @param Robber[] $robbers
     * @param Vault[] $vaults
     * @return int
     */
    public function execute(array $robbers, array $vaults): int
    {
        foreach ($vaults as $vault) {
            $robbers[0]->workOn($vault);

            usort($robbers, function (Robber $robberA, Robber $robberB) {
                return $robberA->getTotalSeconds() <=> $robberB->getTotalSeconds();
            });
        }

        return $robbers[count($robbers) - 1]->getTotalSeconds();
    }
}
