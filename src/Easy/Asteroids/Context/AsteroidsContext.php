<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Easy\Asteroids\Context;

use Assert\Assert;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use TBoileau\CodinGame\Easy\Asteroids\Entity\Picture;
use TBoileau\CodinGame\Easy\Asteroids\UseCase\DetermineFinalPicture;
use TBoileau\CodinGame\Easy\Asteroids\ValueObject\Time;

final class AsteroidsContext implements Context
{
    private Picture $picture;

    private Time $finalTime;

    /**
     * @Given /^the first picture at (\d+) :$/
     */
    public function theFirstPictureAt(int $time, PyStringNode $string)
    {
        $this->picture = Picture::createFromRawStringAt($string->getRaw(), Time::create($time));
    }

    /**
     * @Given /^the second picture at (\d+) :$/
     */
    public function theSecondPictureAt(int $time, PyStringNode $string)
    {
        $this->picture->update($string->getRaw(), Time::create($time));
    }

    /**
     * @When /^we want to determine the positions of asteroids at (\d+)$/
     */
    public function weWantToDetermineThePositionsOfAsteroidsAt(int $time)
    {
        $this->finalTime = Time::create($time);
    }

    /**
     * @Then /^we should have the following picture :$/
     */
    public function weShouldHaveTheFollowingPicture(PyStringNode $string)
    {
        $useCase = new DetermineFinalPicture();

        $useCase->execute($this->picture, $this->finalTime);

        Assert::that($this->picture->__toString())->eq($string->getRaw());
    }
}
