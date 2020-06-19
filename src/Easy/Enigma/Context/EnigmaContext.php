<?php

namespace TBoileau\CodinGame\Easy\Enigma\Context;

use Assert\Assertion;
use Behat\Behat\Context\Context;
use TBoileau\CodinGame\Easy\Enigma\UseCase\Decode;
use TBoileau\CodinGame\Easy\Enigma\UseCase\Encode;

/**
 * Class EnigmaContext
 * @package TBoileau\CodinGame\Easy\Enigma\Context
 */
class EnigmaContext implements Context
{
    /**
     * @var Encode
     */
    private $encode;

    /**
     * @var Decode
     */
    private $decode;

    public function __construct()
    {
        $this->encode = new Encode();
        $this->decode = new Decode();
    }

    /**
     * @Given we need to :mode the following message :message
     * @param string $mode
     * @param string $message
     */
    public function weNeedTo(string $mode, string $message): void
    {

    }

    /**
     * @When the starting shift is :starting_shift
     * @param int $startingShift
     */
    public function startingShift(int $startingShift): void
    {

    }

    /**
     * @When adding the rotor :rotor
     * @param string $rotor
     */
    public function addRotor(string $rotor): void
    {

    }

    /**
     * @Then final output :output is sent via Radio Transmitter
     * @param string $output
     */
    public function sentFinalOutput(string $output): void
    {
        Assertion::eq(
            $output,
            $this->encode->execute()
        );
    }
}
