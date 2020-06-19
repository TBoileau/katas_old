<?php

namespace TBoileau\CodinGame\Easy\RectanglePartition\UseCase;

use TBoileau\CodinGame\Easy\RectanglePartition\Entity\Rectangle;

/**
 * Class CountSquares
 * @package TBoileau\CodinGame\Easy\RectanglePartition\UseCase
 */
class CountSquares
{
    public function execute(Rectangle $rectangle): int
    {
        $squares = 0;
        foreach ($rectangle->getWidthMeasurements() as $x) {
            foreach ($rectangle->getHeightMeasurements() as $y) {
                if ($y > $x) {
                    break;
                }

                if ($x === $y) {
                    $squares++;
                }
            }
        }

        return $squares;
    }
}
