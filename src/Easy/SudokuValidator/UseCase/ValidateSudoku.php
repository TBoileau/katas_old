<?php

namespace TBoileau\CodinGame\Easy\SudokuValidator\UseCase;

use TBoileau\CodinGame\Easy\SudokuValidator\Entity\SudokuGrid;

/**
 * Class ValidateSudoku
 * @package TBoileau\CodinGame\Easy\SudokuValidator\UseCase
 */
class ValidateSudoku
{
    /**
     * @param SudokuGrid $sudokuGrid
     * @return bool
     */
    public function execute(SudokuGrid $sudokuGrid): bool
    {
        foreach ($sudokuGrid->getRows() as $numbers) {
            if (count(array_unique($numbers)) < 9) {
                return false;
            }
        }

        foreach ($sudokuGrid->getColumns() as $numbers) {
            if (count(array_unique($numbers)) < 9) {
                return false;
            }
        }

        foreach ($sudokuGrid->getSubGrids() as $numbers) {
            if (count(array_unique($numbers)) < 9) {
                return false;
            }
        }

        return true;
    }
}
