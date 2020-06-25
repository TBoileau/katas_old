<?php

namespace TBoileau\CodinGame\Easy\SudokuValidator\Context;

use Assert\Assertion;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use TBoileau\CodinGame\Easy\SudokuValidator\Entity\SudokuGrid;
use TBoileau\CodinGame\Easy\SudokuValidator\UseCase\ValidateSudoku;

/**
 * Class SudokuValidatorContext
 * @package TBoileau\CodinGame\Easy\SudokuValidator\Context
 */
class SudokuValidatorContext implements Context
{
    /**
     * @var ValidateSudoku
     */
    private $validateSudoku;

    /**
     * @var SudokuGrid
     */
    private $sudokuGrid;

    /**
     * VanEcksSequenceContext constructor.
     */
    public function __construct()
    {
        $this->validateSudoku = new ValidateSudoku();
    }

    /**
     * @Given I have to check a sudoku grid from player
     */
    public function iHaveToCheckSudokuGrid(): void
    {
    }

    /**
     * @When the player give me the following sudoku grid:
     * @param PyStringNode $sudokuGrid
     */
    public function playerGiveMeHisSudokuGrid(PyStringNode $sudokuGrid): void
    {
        $this->sudokuGrid = new SudokuGrid(
            array_map(
                function (string $line) {
                    return explode(" ", trim($line));
                },
                $sudokuGrid->getStrings()
            )
        );
    }

    /**
     * @Then his sudoku grid is :status
     * @param string $status
     * @throws \Assert\AssertionFailedException
     */
    public function hisSudokuGridIs(string $status): void
    {
        Assertion::eq(
            $status === "good",
            $this->validateSudoku->execute($this->sudokuGrid)
        );
    }
}
