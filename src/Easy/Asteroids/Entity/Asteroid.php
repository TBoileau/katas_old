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

    public function determineFinalPositionAt(Time $at): void
    {
        $firstPoint = $this->points[0];
        $secondPoint = $this->points[1];

        $nextX = $secondPoint->position->x;
        $nextY = $secondPoint->position->y;

        $firstTimeDiff = $secondPoint->time->time - $firstPoint->time->time;
        $lastTimeDiff = $at->time - $secondPoint->time->time;

        $getNext = static function (int $first, int $second) use ($firstTimeDiff, $lastTimeDiff) {
            $diff = $second - $first;
            $diff = $diff / $firstTimeDiff;
            $diff = $diff * $lastTimeDiff;

            return intval(floor($second + $diff));
        };

        if ($firstPoint->position->y !== $secondPoint->position->y) {
            $nextY = $getNext($firstPoint->position->y, $secondPoint->position->y);
        }

        if ($firstPoint->position->x !== $secondPoint->position->x) {
            $nextX = $getNext($firstPoint->position->x, $secondPoint->position->x);
        }

        $this->addPoint(Point::create($at, Position::create($nextY, $nextX)));
    }

    public function getFinalPoint(): Point
    {
        return $this->points[count($this->points) - 1];
    }
}
