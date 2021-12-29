<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Easy\EquivalentResistanceCircuitBuilding\Entity;

abstract class Part
{
    abstract public function calculate(): float;
}
