<?php

namespace TBoileau\CodinGame\Easy\Enigma\UseCase;

use TBoileau\CodinGame\Easy\Enigma\Entity\Message;

/**
 * Class Decode
 * @package TBoileau\CodinGame\Easy\Enigma\UseCase
 */
class Decode
{
    /**
     * @param Message $message
     * @return string
     */
    public function execute(Message $message): string
    {
        foreach ($message as $character) {
            foreach ($message->getReversedEncryptionMachines() as $encryptionMachine) {
                $character->from($encryptionMachine);
            }
        }

        return $message;
    }
}
