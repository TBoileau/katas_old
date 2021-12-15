<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Medium\WinamaxBattle\Context;

use Assert\Assert;
use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use TBoileau\CodinGame\Medium\WinamaxBattle\Comparator\CardComparator;
use TBoileau\CodinGame\Medium\WinamaxBattle\Entity\Deck;
use TBoileau\CodinGame\Medium\WinamaxBattle\Entity\Player;
use TBoileau\CodinGame\Medium\WinamaxBattle\UseCase\IdentifyWinner;
use TBoileau\CodinGame\Medium\WinamaxBattle\ValueObject\Card;

class WinamaxBattleContext implements Context
{
    private Player $playerOne;

    private Player $playerTwo;

    /**
     * @Given /^we identify the winner of the battle between 2 players$/
     */
    public function weIdentifyTheWinnerOfTheBattleBetweenTwoPlayers(): void
    {
    }

    /**
     * @When /^player (\w+) has:$/
     */
    public function playerHas(string $player, PyStringNode $string): void
    {
        $this->{sprintf('player%s', ucfirst($player))} = Player::create(
            Deck::create(
                array_map(
                    [Card::class, 'create'],
                    $string->getStrings()
                )
            )
        );
    }

    /**
     * @Then /^player (\w+) wins in (\d+) rounds$/
     */
    public function playerWinsInRounds(string $player, int $rounds): void
    {
        $cardComparator = new CardComparator();
        $useCase = new IdentifyWinner($cardComparator);
        $winner = $useCase($this->playerOne, $this->playerTwo);
        Assert::that($winner->winner)->eq($this->{sprintf('player%s', ucfirst($player))});
        Assert::that($winner->rounds)->eq($rounds);
    }

    /**
     * @Then /^PAT$/
     */
    public function pat(): void
    {
        $cardComparator = new CardComparator();
        $useCase = new IdentifyWinner($cardComparator);
        $winner = $useCase($this->playerOne, $this->playerTwo);
        Assert::that($winner)->null();
    }
}
