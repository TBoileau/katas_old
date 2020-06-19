<?php

namespace TBoileau\CodinGame\Easy\Enigma\UseCase;

use TBoileau\CodinGame\Easy\Enigma\Entity\Message;

/**
 * Class Encode
 * @package TBoileau\CodinGame\Easy\Enigma\UseCase
 */
class Encode
{
    /**
     * @param Message $message
     * @return string
     */
    public function execute(Message $message): string
    {
        foreach ($message as $character) {
            foreach ($message->getEncryptionMachines() as $encryptionMachine) {
                $character->to($encryptionMachine);
            }
        }

        return $message;
    }
}
