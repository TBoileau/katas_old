<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Easy\DungeonsAndMaps\Entity;

use TBoileau\CodinGame\Easy\DungeonsAndMaps\ValueObject\Coordinate;

final class Map
{
    /**
     * @var array<int, array<int, Cell>>
     */
    private array $cellReferences = [];

    public bool $explored = false;

    public bool $treasureHasBeenFound = false;

    public int $numberOfActionsToFindTreasure = 0;

    /**
     * @param array<array-key, Cell> $cells
     */
    private function __construct(public int $height, public int $width, public array $cells)
    {
        $this->cellReferences = array_fill(
            0,
            $this->height,
            array_fill(
                0,
                $this->width,
                null
            )
        );

        foreach ($this->cells as $cell) {
            $this->cellReferences[$cell->coordinate->y][$cell->coordinate->x] = $cell;
        }
    }

    public static function createFromRaw(string $raw): Map
    {
        $rows = array_map('str_split', explode("\n", $raw));

        /** @var array<array-key, Cell> $cells */
        $cells =  [];

        foreach ($rows as $y => $row) {
            foreach ($row as $x => $column) {
                $coordinate = Coordinate::create($y, $x);

                $cells[] = Cell::create($coordinate, $column);
            }
        }

        return new self(count($rows), count($rows[0]), $cells);
    }

    public function getCellFromCoordinate(Coordinate $coordinate): ?Cell
    {
        return $this->cellReferences[$coordinate->y][$coordinate->x] ?? null;
    }
}
