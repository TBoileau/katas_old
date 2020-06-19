<?php

namespace TBoileau\CodinGame\Easy\Enigma\Entity;

/**
 * Class Character
 * @package TBoileau\CodinGame\Easy\Enigma\Entity
 */
class Character implements \Stringable
{
    /**
     * @var string
     */
    private $content;

    /**
     * Character constructor.
     * @param string $content
     */
    public function __construct(string $content)
    {
        $this->content = $content;
    }

    /**
     * @param Encoder $encoder
     */
    public function to(Encoder $encoder): void
    {
        $this->content = $encoder->encode($this->content);
    }

    /**
     * @param Decoder $decoder
     */
    public function from(Decoder $decoder): void
    {
        $this->content = $decoder->decode($this->content);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->content;
    }
}
