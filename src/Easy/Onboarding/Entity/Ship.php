<?php

namespace TBoileau\CodinGame\Easy\Onboarding\Entity;

/**
 * Class Ship
 * @package TBoileau\CodinGame\Easy\Onboarding\Entity
 */
class Ship
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $distance;

    /**
     * Ship constructor.
     * @param string $name
     * @param int $distance
     */
    public function __construct(string $name, int $distance)
    {
        $this->name = $name;
        $this->distance = $distance;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getDistance(): int
    {
        return $this->distance;
    }
}
