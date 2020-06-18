<?php

namespace TBoileau\CodinGame\Easy\Onboarding\UseCase;

use TBoileau\CodinGame\Easy\Onboarding\Entity\Ship;

/**
 * Class SearchAndDestroy
 * @package TBoileau\CodinGame\Easy\Onboarding\UseCase
 */
class SearchAndDestroy
{
    /**
     * @param Ship[] $ships
     * @return Ship
     */
    public function execute(array $ships): Ship
    {
        usort($ships, function (Ship $ship1, Ship $ship2) {
            return $ship1->getDistance() <=> $ship2->getDistance();
        });
        return $ships[0];
    }
}
