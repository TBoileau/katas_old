<?php

namespace TBoileau\CodinGame\Easy\TicTacToe\UseCase;

use TBoileau\CodinGame\Easy\TicTacToe\Entity\Board;
use TBoileau\CodinGame\Easy\TicTacToe\Entity\Cell;

/**
 * Class FindWinningMove
 * @package TBoileau\CodinGame\Easy\TicTacToe\UseCase
 */
class FindWinningMove
{
    /**
     * @param Board $board
     * @return array|null
     */
    public function execute(Board $board): ?array
    {
        foreach ($board->getWinningCombinations() as $cells) {
            $signs = array_map(function (Cell $cell) {
                return $cell->getSign();
            }, $cells);

            $countSigns = array_count_values($signs);

            if (($countSigns["."] ?? 0) === 1 && ($countSigns["O"] ?? 0) === 2) {
                /** @var Cell $cell */
                $cell = current(array_filter($cells, function (Cell $cell) {
                    return $cell->getSign() === ".";
                }));

                $cell->setSign("O");

                return $board->toArray();
            }
        }

        return null;
    }
}
