<?php

namespace TBoileau\CodinGame\Easy\Enigma\Entity;

/**
 * Class Rotor
 * @package TBoileau\CodinGame\Easy\Enigma\Entity
 */
class Rotor implements EncryptionMachine
{
    /**
     * @var string[]
     */
    private $characters;

    /**
     * Rotor constructor.
     * @param string $characters
     */
    public function __construct(string $characters)
    {
        $this->characters = str_split($characters);
    }

    /**
     * @param string $character
     * @return string
     */
    public function encode(string $character): string
    {
        return $this->characters[array_search($character, range('A', 'Z'))];
    }

    /**
     * @param string $character
     * @return string
     */
    public function decode(string $character): string
    {
        return range('A', 'Z')[array_search($character, $this->characters)];
    }
}
