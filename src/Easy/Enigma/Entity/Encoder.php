<?php

namespace TBoileau\CodinGame\Easy\Enigma\Entity;

/**
 * Interface Encoder
 * @package TBoileau\CodinGame\Easy\Enigma\Entity
 */
interface Encoder
{
    /**
     * @param string $character
     * @return string
     */
    public function encode(string $character): string;
}
