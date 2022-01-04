<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Easy\DungeonsAndMaps\Entity;

use TBoileau\CodinGame\Easy\DungeonsAndMaps\ValueObject\Coordinate;

final class Explorer
{
    public function explore(Map $map, Coordinate $start): void
    {
        $coordinate = $start;

        /** @var Action $cell */
        $cell = $map->getCellFromCoordinate($coordinate);

        /** @var array<array-key, Cell> $cells */
        $cells = [];

        while ($cell instanceof Action && !in_array($cell, $cells)) {
            $cells[] = $cell;

            $cell = $map->getCellFromCoordinate($cell->coordinate->next($cell->direction));

            $map->numberOfActionsToFindTreasure++;
        }

        $map->explored = true;

        if ($cell instanceof Treasure) {
            $map->treasureHasBeenFound = true;
        }
    }
}
