<?php

namespace TBoileau\CodinGame\Easy\BankRobbers\Entity;

/**
 * Class Vault
 * @package TBoileau\CodinGame\Easy\BankRobbers\Entity
 */
class Vault
{
    /**
     * @var int
     */
    private $combinationLength;

    /**
     * @var int
     */
    private $numberOfDigits;

    /**
     * Vault constructor.
     * @param int $combinationLength
     * @param int $numberOfDigits
     */
    public function __construct(int $combinationLength, int $numberOfDigits)
    {
        $this->combinationLength = $combinationLength;
        $this->numberOfDigits = $numberOfDigits;
    }

    /**
     * @return int
     */
    public function numberOfSecondsToCrackVault(): int
    {
        return pow(5, $this->combinationLength - $this->numberOfDigits) * pow(10, $this->numberOfDigits);
    }
}
