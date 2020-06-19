<?php

namespace TBoileau\CodinGame\Easy\Enigma\Entity;

/**
 * Class Caesar
 * @package TBoileau\CodinGame\Easy\Enigma\Entity
 */
class Caesar implements EncryptionMachine
{
    /**
     * @var int
     */
    private $startingShift;

    /**
     * @var int
     */
    private $position = 0;

    /**
     * Caesar constructor.
     * @param int $startingShift
     */
    public function __construct(int $startingShift)
    {
        $this->startingShift = $startingShift;
    }

    /**
     * @param string $character
     * @return string
     */
    public function decode(string $character): string
    {
        $alphabet = range('A', 'Z');
        $index = array_search($character, $alphabet) - $this->startingShift - $this->position;
        while ($index < 0) {
            $index += 26;
        }
        $this->position++;
        return $alphabet[$index % 26];
    }

    /**
     * @param string $character
     * @return string
     */
    public function encode(string $character): string
    {
        $alphabet = range('A', 'Z');
        $index = array_search($character, $alphabet) + $this->startingShift + $this->position;
        $this->position++;
        return $alphabet[$index % 26];
    }
}
