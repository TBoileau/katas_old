<?php

namespace TBoileau\CodinGame\Easy\GhostLegs\Entity;

/**
 * Class Diagram
 * @package TBoileau\CodinGame\Easy\GhostLegs\Entity
 */
class Diagram
{
    /**
     * @var Line[]
     */
    private $lines = [];

    /**
     * @var int
     */
    private $height;

    /**
     * @param array $diagramArr
     * @return static
     */
    public static function createFromArray(array $diagramArr): self
    {
        $firstLine = explode("  ", array_shift($diagramArr));
        $lastLine = explode("  ", array_pop($diagramArr));

        $diagram = new Diagram();

        foreach ($firstLine as $i => $start) {
            $diagram->lines[] = new Line($start, $lastLine[$i]);
        }

        $diagram->height = count($diagramArr);

        foreach (array_values($diagramArr) as $j => $steps) {
            $steps = str_split($steps);
            foreach ($diagram->lines as $i => $line) {
                $index = $i * 3;
                if (isset($steps[$index - 1]) && $steps[$index - 1] === "-") {
                    $line->connectTo($diagram->lines[$i - 1], $j);
                }
                if (isset($steps[$index + 1]) && $steps[$index + 1] === "-") {
                    $line->connectTo($diagram->lines[$i + 1], $j);
                }
            }
        }

        return $diagram;
    }

    /**
     * @return Line[]
     */
    public function getLines(): array
    {
        return $this->lines;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }
}
