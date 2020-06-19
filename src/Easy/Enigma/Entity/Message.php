<?php

namespace TBoileau\CodinGame\Easy\Enigma\Entity;

/**
 * Class Message
 * @package TBoileau\CodinGame\Easy\Enigma\Entity
 */
class Message implements \Stringable, \Iterator
{
    /**
     * @var EncryptionMachine[]
     */
    private $encryptionMachines = [];

    /**
     * @var Character[]
     */
    private $characters;

    /**
     * @var int
     */
    private $position = 0;

    /**
     * Message constructor.
     * @param string $content
     */
    public function __construct(string $content)
    {
        $this->characters = array_map(function (string $character) {
            return new Character($character);
        }, str_split($content));
    }

    /**
     * @return EncryptionMachine[]
     */
    public function getReversedEncryptionMachines(): array
    {
        return array_reverse($this->encryptionMachines);
    }

    /**
     * @return EncryptionMachine[]
     */
    public function getEncryptionMachines(): array
    {
        return $this->encryptionMachines;
    }

    /**
     * @param EncryptionMachine $encryptionMachine
     */
    public function addEncryptionMachine(EncryptionMachine $encryptionMachine): void
    {
        $this->encryptionMachines[] = $encryptionMachine;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return implode("", $this->characters);
    }

    public function current()
    {
        return $this->characters[$this->position];
    }

    public function next()
    {
        $this->position++;
    }

    public function key()
    {
        return $this->position;
    }

    public function valid()
    {
        return isset($this->characters[$this->position]);
    }

    public function rewind()
    {
        $this->position = 0;
    }
}
