<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Easy\DungeonsAndMaps\Context;

use Assert\Assert;
use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use TBoileau\CodinGame\Easy\DungeonsAndMaps\Entity\Bag;
use TBoileau\CodinGame\Easy\DungeonsAndMaps\Entity\Map;
use TBoileau\CodinGame\Easy\DungeonsAndMaps\UseCase\FindMapWithTheShortestPath;
use TBoileau\CodinGame\Easy\DungeonsAndMaps\ValueObject\Coordinate;

final class DungeonsAndMapsContext implements Context
{
    private Bag $bag;

    private Coordinate $start;

    /**
     * @Given /^I want to explore a dungeon and find the treasure$/
     */
    public function iWantToExploreADungeonAndFindTheTreasure(): void
    {
        $this->bag = new Bag();
    }

    /**
     * @Given /^the pack of old maps contains :$/
     */
    public function thePackOfOldMapsContains(PyStringNode $string)
    {
        $this->bag->maps[] = Map::createFromRaw($string->getRaw());
    }

    /**
     * @When /^I explore the dungeons starting at (\d+) and (\d+)$/
     */
    public function iExploreTheDungeonsStartingAtAnd(int $y, int $x)
    {
        $this->start = Coordinate::create($y, $x);
    }

    /**
     * @Then /^the map with valid and shortest path is (\d+)$/
     */
    public function theMapWithValidAndShortestPathIs(int $index)
    {
        $useCase = new FindMapWithTheShortestPath();

        $map = $useCase->execute($this->bag, $this->start);

        Assert::that(array_search($map, $this->bag->maps))->eq($index);
    }

    /**
     * @Then /^it's a trap$/
     */
    public function itSATrap()
    {
        $useCase = new FindMapWithTheShortestPath();

        Assert::that($useCase->execute($this->bag, $this->start))->null();
    }
}
