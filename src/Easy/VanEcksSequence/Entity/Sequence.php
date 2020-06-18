<?php

namespace TBoileau\CodinGame\Easy\VanEcksSequence\Entity;

/**
 * Class Sequence
 * @package TBoileau\CodinGame\Easy\VanEcksSequence\Entity
 */
class Sequence implements \Countable
{
    /**
     * @var int[]
     */
    private $suite;

    /**
     * @var int[]
     */
    private $positions = [];

    /**
     * Sequence constructor.
     * @param int $start
     */
    public function __construct(int $start)
    {
        $this->suite[] = $start;
    }

    /**
     * @param int $number
     * @return int
     */
    private function getIntervalToTheLastPositionOf(int $number): int
    {
        if (!isset($this->positions[$number])) {
            return 0;
        }

        return $this->count() - 1 - $this->positions[$number];
    }

    public function generate(): void
    {
        $this->add($this->getIntervalToTheLastPositionOf($this->last()));
    }

    /**
     * @param int $number
     */
    private function add(int $number): void
    {
        $this->positions[$this->last()] = $this->count() - 1;
        $this->suite[] = $number;
    }

    /**
     * @return int
     */
    public function last(): int
    {
        return $this->suite[$this->count() - 1];
    }

    /**
     * @param int $position
     * @return bool
     */
    public function exists(int $position): bool
    {
        return isset($this->suite[$position - 1]);
    }

    /**
     * @param int $position
     * @return int|null
     */
    public function get(int $position): ?int
    {
        if (isset($this->suite[$position - 1])) {
            return $this->suite[$position - 1];
        }

        return null;
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->suite);
    }
}
