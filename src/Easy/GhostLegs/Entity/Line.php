<?php

namespace TBoileau\CodinGame\Easy\GhostLegs\Entity;

/**
 * Class Line
 * @package TBoileau\CodinGame\Easy\GhostLegs\Entity
 */
class Line
{
    /**
     * @var Line[]
     */
    private $connectors = [];

    /**
     * @var string
     */
    private $start;

    /**
     * @var string
     */
    private $end;

    /**
     * Line constructor.
     * @param string $start
     * @param string $end
     */
    public function __construct(string $start, string $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * @param Line $line
     * @param int $position
     */
    public function connectTo(Line &$line, int $position): void
    {
        $this->connectors[$position] = $line;
    }

    /**
     * @param int $position
     * @return Line
     */
    public function to(int $position): Line
    {
        return $this->connectors[$position] ?? $this;
    }

    /**
     * @return string
     */
    public function getStart(): string
    {
        return $this->start;
    }

    /**
     * @return string
     */
    public function getEnd(): string
    {
        return $this->end;
    }
}
