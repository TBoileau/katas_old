<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Easy\Asteroids\Entity;

use TBoileau\CodinGame\Easy\Asteroids\ValueObject\Position;
use TBoileau\CodinGame\Easy\Asteroids\ValueObject\Time;

final class Asteroid
{
    /**
     * @param array<array-key, Point> $points
     */
    private function __construct(public string $name, public array $points)
    {
    }

    /**
     * @param array<array-key, Point> $points
     */
    public static function create(string $name, array $points): Asteroid
    {
        return new self($name, $points);
    }

    public function addPoint(Point $point): void
    {
        $this->points[] = $point;
    }

    public function determineFinalPositionAt(Time $finalTime): void
    {
        $firstPoint = $this->points[0];
        $secondPoint = $this->points[1];

        $ratio = ($finalTime->time - $secondPoint->time->time) / ($secondPoint->time->time - $firstPoint->time->time);

        $getNext = static fn (int $first, int $second) => intval(floor($second + ($second - $first) * $ratio));

        $this->addPoint(
            Point::create(
                $finalTime,
                Position::create(
                    $getNext($firstPoint->position->y, $secondPoint->position->y),
                    $getNext($firstPoint->position->x, $secondPoint->position->x)
                )
            )
        );
    }

    public function getFinalPoint(): Point
    {
        return $this->points[count($this->points) - 1];
    }
}
