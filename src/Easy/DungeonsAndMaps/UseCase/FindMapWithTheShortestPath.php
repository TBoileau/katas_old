<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Easy\DungeonsAndMaps\UseCase;

use TBoileau\CodinGame\Easy\DungeonsAndMaps\Entity\Bag;
use TBoileau\CodinGame\Easy\DungeonsAndMaps\Entity\Explorer;
use TBoileau\CodinGame\Easy\DungeonsAndMaps\Entity\Map;
use TBoileau\CodinGame\Easy\DungeonsAndMaps\ValueObject\Coordinate;

final class FindMapWithTheShortestPath
{
    public function execute(Bag $bag, Coordinate $start): ?Map
    {
        $explorer = new Explorer();

        /** @var Map $map */
        $mapWithShortestPath = null;

        foreach ($bag->maps as $map) {
            $explorer->explore($map, $start);

            if (
                !$map->treasureHasBeenFound
                || (
                    $mapWithShortestPath !== null
                    && $mapWithShortestPath->numberOfActionsToFindTreasure <= $map->numberOfActionsToFindTreasure
                )
            ) {
                continue;
            }

            $mapWithShortestPath = $map;
        }

        return $mapWithShortestPath;
    }
}
