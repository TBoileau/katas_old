<?php

namespace TBoileau\CodinGame\Easy\NatureOfQuadrilaterals\UseCase;

use TBoileau\CodinGame\Easy\NatureOfQuadrilaterals\Entity\Point;
use TBoileau\CodinGame\Easy\NatureOfQuadrilaterals\Entity\Quadrilateral;

/**
 * Class DetermineNatureOfQuadrilateral
 * @package TBoileau\CodinGame\Easy\NatureOfQuadrilaterals\UseCase
 */
class DetermineNatureOfQuadrilateral
{
    /**
     * @param Quadrilateral $quadrilateral
     * @return string
     */
    public function execute(Quadrilateral $quadrilateral): string
    {
        if ($quadrilateral->isParallelogram()) {
            if($quadrilateral->isRhombus()) {
                return "rhombus";
            }
            if($quadrilateral->isRectangle()) {
                return "rectangle";
            }
            if($quadrilateral->isSquare()) {
                return "square";
            }

            return "parallelogram";
        }
        return "quadrilateral";
    }
}
