<?php

namespace TBoileau\CodinGame\Easy\TicTacToe\Entity;

/**
 * Class Cell
 * @package TBoileau\CodinGame\Easy\TicTacToe\Entity
 */
class Cell
{
    /**
     * @var int
     */
    private $line;

    /**
     * @var int
     */
    private $column;

    /**
     * @var string
     */
    private $sign;

    /**
     * Cell constructor.
     * @param int $line
     * @param int $column
     * @param string $sign
     */
    public function __construct(int $line, int $column, string $sign)
    {
        $this->line = $line;
        $this->column = $column;
        $this->sign = $sign;
    }

    /**
     * @return int
     */
    public function getLine(): int
    {
        return $this->line;
    }

    /**
     * @return int
     */
    public function getColumn(): int
    {
        return $this->column;
    }

    /**
     * @return string
     */
    public function getSign(): string
    {
        return $this->sign;
    }

    /**
     * @param string $sign
     */
    public function setSign(string $sign): void
    {
        $this->sign = $sign;
    }
}
