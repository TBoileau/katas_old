<?php

namespace TBoileau\CodinGame\Easy\RectanglePartition\Context;

use Assert\Assertion;
use Behat\Behat\Context\Context;
use TBoileau\CodinGame\Easy\RectanglePartition\Entity\Rectangle;
use TBoileau\CodinGame\Easy\RectanglePartition\UseCase\CountSquares;

/**
 * Class RectanglePartitionContext
 * @package TBoileau\CodinGame\Easy\RectanglePartition\Context
 */
class RectanglePartitionContext implements Context
{
    /**
     * @var CountSquares
     */
    private $countSquares;

    /**
     * @var int
     */
    private $width;

    /**
     * @var int
     */
    private $height;

    /**
     * @var string
     */
    private $widthSideMeasurements;

    /**
     * @var string
     */
    private $heightSideMeasurements;

    /**
     * RectanglePartitionContext constructor.
     */
    public function __construct()
    {
        $this->countSquares = new CountSquares();
    }

    /**
     * @Given there is a rectangle of given width :width and height :height
     * @param int $width
     * @param int $height
     */
    public function rectangle(int $width, int $height): void
    {
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * @When /^on the width side (.*)$/
     * @param string $widthSideMeasurements
     */
    public function widthSide(string $widthSideMeasurements): void
    {
        $this->widthSideMeasurements = trim($widthSideMeasurements);
    }

    /**
     * @When /^on the height side, there is the following list of measurements (.*)$/
     * @param string $heightSideMeasurements
     */
    public function heightSide(string $heightSideMeasurements): void
    {
        $this->heightSideMeasurements = trim($heightSideMeasurements);
    }

    /**
     * @Then I count :squares squares
     * @param int $squares
     * @throws \Assert\AssertionFailedException
     */
    public function count(int $squares): void
    {
        Assertion::eq(
            $squares,
            $this->countSquares->execute(
                Rectangle::create($this->width, $this->height, $this->widthSideMeasurements, $this->heightSideMeasurements)
            )
        );
    }
}
