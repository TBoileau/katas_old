<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Medium\StockExchangeLosses\Context;

use Assert\Assert;
use Behat\Behat\Context\Context;
use TBoileau\CodinGame\Medium\StockExchangeLosses\UseCase\AnalyzeLosses;
use TBoileau\CodinGame\Medium\StockExchangeLosses\ValueObject\StockValue;

class StockExchangeLossesContext implements Context
{
    /**
     * @var array<array-key, StockValue>
     */
    private array $values;

    /**
     * @Given /^we want to find the biggest loss$/
     */
    public function weWantToFindTheBiggestLoss()
    {
    }

    /**
     * @When /^we analyze the following data (.*)$/
     */
    public function weAnalyzeTheFollowingData(string $values)
    {
        $this->values = array_map([StockValue::class, 'create'], array_map('intval', explode(' ', $values)));

    }

    /**
     * @Then /^we must have a loss of (.*)$/
     */
    public function weMustHaveALossOf(int $loss)
    {
        $useCase = new AnalyzeLosses();

        Assert::that($useCase($this->values))->eq($loss);
    }
}
