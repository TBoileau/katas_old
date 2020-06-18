<?php

namespace TBoileau\CodinGame\Easy\VanEcksSequence\UseCase;

use TBoileau\CodinGame\Easy\VanEcksSequence\Entity\Sequence;

/**
 * Class FindNumberInSequence
 * @package TBoileau\CodinGame\Easy\VanEcksSequence\UseCase
 */
class FindNumberInSequence
{
    /**
     * @param Sequence $sequence
     * @param int $position
     * @return int
     */
    public function execute(Sequence $sequence, int $position): int
    {
        while (!$sequence->exists($position)) {
            $sequence->generate();
        }

        return $sequence->get($position);
    }
}
