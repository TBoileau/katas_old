<?php

namespace TBoileau\CodinGame\Easy\RectanglePartition\Entity;

/**
 * Class Rectangle
 * @package TBoileau\CodinGame\Easy\RectanglePartition\Entity
 */
class Rectangle
{
    /**
     * @var int
     */
    private $width;

    /**
     * @var int
     */
    private $height;

    /**
     * @var int[]
     */
    private $widthMeasurements = [];

    /**
     * @var int[]
     */
    private $heightMeasurements = [];

    /**
     * @param int $width
     * @param int $height
     * @param string $widthMeasurements
     * @param string $heightMeasurements
     * @return static
     */
    public static function create(int $width, int $height, string $widthMeasurements, string $heightMeasurements): self
    {
        $rectangle = new Rectangle();
        $rectangle->width = $width;
        $rectangle->height = $height;

        $widthMeasurements = array_merge([0], explode(" ", $widthMeasurements), [$width]);

        for ($i = 0; $i < count($widthMeasurements); $i++) {
            for ($j = $i + 1; $j < count($widthMeasurements); $j++) {
                $rectangle->widthMeasurements[] = $widthMeasurements[$j] - $widthMeasurements[$i];
            }
        }

        sort($rectangle->widthMeasurements);

        $heightMeasurements = array_merge([0], explode(" ", $heightMeasurements), [$height]);

        for ($i = 0; $i < count($heightMeasurements); $i++) {
            for ($j = $i + 1; $j < count($heightMeasurements); $j++) {
                $rectangle->heightMeasurements[] = $heightMeasurements[$j] - $heightMeasurements[$i];
            }
        }

        sort($rectangle->heightMeasurements);

        return $rectangle;
    }

    /**
     * @return int[]
     */
    public function getWidthMeasurements(): array
    {
        return $this->widthMeasurements;
    }

    /**
     * @return int[]
     */
    public function getHeightMeasurements(): array
    {
        return $this->heightMeasurements;
    }
}
