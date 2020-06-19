<?php

namespace TBoileau\CodinGame\Easy\GhostLegs\UseCase;

use TBoileau\CodinGame\Easy\GhostLegs\Entity\Diagram;

/**
 * Class FindConnectedPairs
 * @package TBoileau\CodinGame\Easy\GhostLegs\UseCase
 */
class FindConnectedPairs
{
    /**
     * @param Diagram $diagram
     * @return array
     */
    public function execute(Diagram $diagram): array
    {
        $connectedPairs = [];
        foreach ($diagram->getLines() as $line) {
            $start = $line->getStart();
            $path = $line;
            for ($i = 0; $i < $diagram->getHeight(); $i++) {
                $path = $path->to($i);
            }
            $connectedPairs[] = $start.$path->getEnd();
        }
        return $connectedPairs;
    }
}
