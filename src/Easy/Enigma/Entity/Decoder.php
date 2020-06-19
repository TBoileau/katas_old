<?php

namespace TBoileau\CodinGame\Easy\Enigma\Entity;

/**
 * Interface Decoder
 * @package TBoileau\CodinGame\Easy\Enigma\Entity
 */
interface Decoder
{
    /**
     * @param string $character
     * @return string
     */
    public function decode(string $character): string;
}
