<?php

namespace TBoileau\CodinGame\Easy\SudokuValidator\Entity;

/**
 * Class SudokuGrid
 * @package TBoileau\CodinGame\Easy\SudokuValidator\Entity
 */
class SudokuGrid
{
    /**
     * @var array[]
     */
    private $rows;

    /**
     * @var array[]|null
     */
    private $columns = null;

    /**
     * @var array[]|null
     */
    private $subGrids = null;

    /**
     * SudokuGrid constructor.
     * @param array $rows
     */
    public function __construct(array $rows)
    {
        $this->rows = $rows;
    }

    /**
     * @return array[]
     */
    public function getRows(): array
    {
        return $this->rows;
    }

    /**
     * @return array[]
     */
    public function getColumns(): array
    {
        if ($this->columns === null) {
            for ($i = 0; $i < 9; $i++) {
                $this->columns[] = array_column($this->rows, $i);
            }
        }

        return $this->columns;
    }

    /**
     * @return array[]
     */
    public function getSubGrids(): array
    {
        if ($this->subGrids === null) {
            $subRow = 0;
            foreach ($this->rows as $row => $columns) {
                $subColumn = 0;
                foreach ($columns as $column => $number) {
                    $this->subGrids[3 * $subRow + $subColumn][] = $number;
                    $subColumn += $column % 3 === 2 ? 1 : 0;
                }
                $subRow += $row % 3 === 2 ? 1 : 0;
            }
        }

        return $this->subGrids;
    }
}
