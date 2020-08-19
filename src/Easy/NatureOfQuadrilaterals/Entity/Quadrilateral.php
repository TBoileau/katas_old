<?php

namespace TBoileau\CodinGame\Easy\NatureOfQuadrilaterals\Entity;

/**
 * Class Quadrilateral
 * @package TBoileau\CodinGame\Easy\NatureOfQuadrilaterals\Entity
 */
class Quadrilateral
{
    /**
     * @var array
     */
    private array $points = [];

    /**
     * @param Point $point
     */
    public function add(Point $point): void
    {
        $this->points[] = $point;
    }

    /**
     * @param int $index
     * @return Point
     */
    public function get(int $index): Point
    {
        return $this->points[$index];
    }

    /**
     * @return bool
     */
    public function isParallelogram(): bool
    {
        return abs($this->get(0)->getX() + $this->get(2)->getX())
            === abs($this->get(1)->getX() + $this->get(3)->getX())
        && abs($this->get(0)->getY() + $this->get(2)->getY())
            === abs($this->get(1)->getY() + $this->get(3)->getY());
    }

    /**
     * @return bool
     */
    public function isRhombus(): bool
    {
        return $this->get(0)->getY() === $this->get(2)->getY() && $this->get(1)->getX() === $this->get(3)->getX();
    }

    /**
     * @return bool
     */
    public function isRectangle(): bool
    {
        return $this->get(0)->getX() === $this->get(1)->getX() && $this->get(2)->getX() === $this->get(3)->getX()
        && $this->get(1)->getY() === $this->get(2)->getY() && $this->get(3)->getY() === $this->get(0)->getY();
    }

    /**
     * @return bool
     */
    public function isSquare(): bool
    {
        return ($this->get(0)->getX() - $this->get(1)->getX()) - ($this->get(3)->getX() - $this->get(2)->getX()) === 0
            && ($this->get(0)->getY() - $this->get(3)->getY()) - ($this->get(1)->getY() - $this->get(2)->getY()) === 0
            && ($this->get(0)->getX() - $this->get(2)->getX()) - ($this->get(1)->getY() - $this->get(3)->getY()) === 0;
    }
}
