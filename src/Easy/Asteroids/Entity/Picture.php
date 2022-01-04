<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Easy\Asteroids\Entity;

use TBoileau\CodinGame\Easy\Asteroids\ValueObject\Position;
use TBoileau\CodinGame\Easy\Asteroids\ValueObject\Time;

final class Picture implements \Stringable
{
    /**
     * @var array<int, array<int, Asteroid[]>>
     */
    private array $asteroidPositionReferences = [];

    /**
     * @param array<string, Asteroid> $asteroids
     */
    private function __construct(public Time $time, public int $width, public int $height, public array $asteroids)
    {
        $this->generateReferences();
    }

    public static function createFromRawStringAt(string $raw, Time $time): Picture
    {
        $rows = array_map('str_split', explode("\n", $raw));

        /** @var array<string, Asteroid> $asteroids */
        $asteroids = [];

        foreach ($rows as $y => $row) {
            foreach ($row as $x => $column) {
                if ($column !== '.') {
                    $asteroids[$column] = Asteroid::create($column, [Point::create($time, Position::create($y, $x))]);
                }
            }
        }

        return new self($time, count($rows), count($rows[0]), $asteroids);
    }

    public function update(string $raw, Time $time): void
    {
        $tempPicture = self::createFromRawStringAt($raw, $time);

        foreach ($tempPicture->asteroids as $asteroid) {
            $this->asteroids[$asteroid->name]->addPoint($asteroid->getFinalPoint());
        }

        $this->generateReferences();
    }

    public function determineFinalPicture(Time $time): void
    {
        foreach ($this->asteroids as $asteroid) {
            $asteroid->determineFinalPositionAt($time);
        }

        $this->generateReferences();
    }

    public function __toString(): string
    {
        $raw = '';

        for ($y = 0; $y < $this->height; $y++) {
            for ($x = 0; $x < $this->height; $x++) {
                if (count($this->asteroidPositionReferences[$y][$x]) > 0) {
                    usort(
                        $this->asteroidPositionReferences[$y][$x],
                        static fn (Asteroid $a, Asteroid $b) => ord($a->name) <=> ord($b->name)
                    );

                    $raw .= $this->asteroidPositionReferences[$y][$x][0]->name;
                    continue;
                }

                $raw .= ".";
            }

            if ($y < $this->height - 1) {
                $raw .= "\n";
            }
        }

        return $raw;
    }

    private function generateReferences(): void
    {
        $this->asteroidPositionReferences = array_fill(
            0,
            $this->height,
            array_fill(
                0,
                $this->width,
                []
            )
        );

        foreach ($this->asteroids as $asteroid) {
            $point = $asteroid->getFinalPoint();

            $this->asteroidPositionReferences[$point->position->y][$point->position->x][] = $asteroid;
        }
    }
}
