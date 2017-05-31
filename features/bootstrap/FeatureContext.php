<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
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
     * @Given there is a product with identification :arg1
     */
    public function thereIsAProductWithIdentification($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When I search for details of product with identification :arg1
     */
    public function iSearchForDetailsOfProductWithIdentification($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I should receive product details as below:
     */
    public function iShouldReceiveProductDetailsAsBelow(TableNode $table)
    {
        throw new PendingException();
    }

    /**
     * @Then will increase product :arg1 search count to :arg2
     */
    public function willIncreaseProductSearchCountTo($arg1, $arg2)
    {
        throw new PendingException();
    }
}
