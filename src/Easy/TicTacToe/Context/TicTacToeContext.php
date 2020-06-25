<?php

namespace TBoileau\CodinGame\Easy\TicTacToe\Context;

use Assert\Assertion;
use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\TableNode;
use TBoileau\CodinGame\Easy\TicTacToe\Entity\Board;
use TBoileau\CodinGame\Easy\TicTacToe\UseCase\FindWinningMove;

/**
 * Class TicTacToeContext
 * @package TBoileau\CodinGame\Easy\TicTacToe\Context
 */
class TicTacToeContext implements Context
{
    /**
     * @var Board
     */
    private $board;

    /**
     * @var FindWinningMove
     */
    private $findWinningMove;

    public function __construct()
    {
        $this->findWinningMove = new FindWinningMove();
    }

    /**
     * @Given /^find the winning move of O player$/
     */
    public function findTheWinningMoveOfOPlayer()
    {
    }

    /**
     * @When /^the following tic tac toe board is :$/
     * @param TableNode $table
     */
    public function theFollowingTicTacToeBoardIs(TableNode $table)
    {
        $this->board = Board::createFromArray(array_values($table->getTable()));
    }

    /**
     * @Then /^the final tic tac toe board is :$/
     */
    public function theFinalTicTacToeBoardIs(TableNode $table)
    {
        Assertion::eq(
            $this->findWinningMove->execute($this->board),
            array_values($table->getTable())
        );
    }

    /**
     * @Then /^the final tic tac toe board is false$/
     */
    public function theFinalTicTacToeBoardIsFalse()
    {
        Assertion::null($this->findWinningMove->execute($this->board));
    }
}
