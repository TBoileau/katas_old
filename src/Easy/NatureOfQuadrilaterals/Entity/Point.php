<?php

namespace TBoileau\CodinGame\Easy\NatureOfQuadrilaterals\Entity;

/**
 * Class Point
 * @package TBoileau\CodinGame\Easy\NatureOfQuadrilaterals\Entity
 */
class Point
{
    /**
     * @var string
     */
    private string $letter;

    /**
     * @var int
     */
    private int $x;

    /**
     * @var int
     */
    private int $y;

    /**
     * Point constructor.
     * @param string $letter
     * @param int $x
     * @param int $y
     */
    public function __construct(string $letter, int $x, int $y)
    {
        $this->letter = $letter;
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return string
     */
    public function getLetter(): string
    {
        return $this->letter;
    }

    /**
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }
}
