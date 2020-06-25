<?php

namespace TBoileau\CodinGame\Easy\TicTacToe\Entity;

/**
 * Class Board
 * @package TBoileau\CodinGame\Easy\TicTacToe\Entity
 */
class Board
{
    /**
     * @var Cell[]
     */
    private $cells = [];

    /**
     * @param array $boardArray
     * @return static
     */
    public static function createFromArray(array $boardArray): self
    {
        $board = new Board();
        foreach ($boardArray as $indexLine => $line) {
            foreach ($line as $indexColumn => $sign) {
                $board->cells[] = new Cell($indexLine, $indexColumn, $sign);
            }
        }

        return $board;
    }

    /**
     * @return array
     */
    public function getWinningCombinations(): array
    {
        $winningCombinations = [];

        for ($i = 0; $i <= 2; $i++) {
            $winningCombinations[] = array_filter($this->cells, function (Cell $cell) use ($i) {
                return $cell->getLine() === $i;
            });
            $winningCombinations[] = array_filter($this->cells, function (Cell $cell) use ($i) {
                return $cell->getColumn() === $i;
            });
        }

        $diagonals = [
            [[0, 0], [1, 1], [2, 2]],
            [[2, 0], [1, 1], [0, 2]]
        ];

        foreach ($diagonals as $diagonal) {
            $winningCombinations[] = array_filter($this->cells, function (Cell $cell) use ($diagonal) {
                return in_array([$cell->getLine(), $cell->getColumn()], $diagonal);
            });
        }

        return $winningCombinations;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $board = [];

        foreach ($this->cells as $cell) {
            $board[$cell->getLine()][$cell->getColumn()] = $cell->getSign();
        }

        return $board;
    }
}
