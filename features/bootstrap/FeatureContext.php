<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    use KnowsTheDomain;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Transform :amount
     */
    public function numberToInt($number)
    {
        return (int) $number;
    }

    /**
     * @Given I have deposited $:amount in my account
     */
    public function iHaveDepositedInMyAccount($amount)
    {
        $this->myAccount()->deposit($amount);
        expect($this->myAccount()->balance)->toBe($amount);
    }

    /**
     * @When I request $:amount
     */
    public function iRequest($amount)
    {
        $this->teller()->withdrawFrom($this->myAccount(), $amount);
    }

    /**
     * @Then $:amount should be dispensed
     */
    public function shouldBeDispensed($amount)
    {
        expect($this->cashSlot()->contents)->toBe($amount);
    }
}
