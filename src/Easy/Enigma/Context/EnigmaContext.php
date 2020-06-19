<?php

namespace TBoileau\CodinGame\Easy\Enigma\Context;

use Assert\Assertion;
use Behat\Behat\Context\Context;
use TBoileau\CodinGame\Easy\Enigma\Entity\Caesar;
use TBoileau\CodinGame\Easy\Enigma\Entity\Message;
use TBoileau\CodinGame\Easy\Enigma\Entity\Rotor;
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

    /**
     * @var string
     */
    private $mode;

    /**
     * @var Message
     */
    private $message;

    /**
     * EnigmaContext constructor.
     */
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
        $this->mode = $mode;
        $this->message = new Message($message);
    }

    /**
     * @When the starting shift is :starting_shift
     * @param int $startingShift
     */
    public function startingShift(int $startingShift): void
    {
        $this->message->addEncryptionMachine(new Caesar($startingShift));
    }

    /**
     * @When adding the rotor :rotor
     * @param string $rotor
     */
    public function addRotor(string $rotor): void
    {
        $this->message->addEncryptionMachine(new Rotor($rotor));
    }

    /**
     * @Then final output :output is sent via Radio Transmitter
     * @param string $output
     */
    public function sentFinalOutput(string $output): void
    {
        if ($this->mode === "DECODE") {
            Assertion::eq(
                $output,
                $this->decode->execute($this->message)
            );
        } else {
            Assertion::eq(
                $output,
                $this->encode->execute($this->message)
            );
        }
    }
}
