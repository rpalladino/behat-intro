<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

use Bank\Account;
use Bank\CashSlot;
use Bank\Teller;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private $my_account;
    private $teller;
    private $cash_slot;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->my_account = new Account();
        $this->cash_slot = new CashSlot();
        $this->teller = new Teller($this->cash_slot);
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
        $this->my_account->deposit($amount);
        expect($this->my_account->balance)->toBe($amount);
    }

    /**
     * @When I request $:amount
     */
    public function iRequest($amount)
    {
        $this->teller->withdrawFrom($this->my_account, $amount);
    }

    /**
     * @Then $:amount should be dispensed
     */
    public function shouldBeDispensed($amount)
    {
        expect($this->cash_slot->contents)->toBe($amount);
    }
}
