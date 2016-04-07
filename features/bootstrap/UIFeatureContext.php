<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;

/**
 * Defines application features from the specific context.
 */
class UIFeatureContext extends MinkContext implements Context, SnippetAcceptingContext
{

    private $name;

    /**
     * @Given /^I am registering$/
     */
    public function iAmRegistering() {
        $this->visitPath('/register');
    }

    /**
     * @When /^I register with the name "([^"]*)" and email "([^"]*)"$/
     */
    public function iRegisterWithTheName($arg1, $arg2) {
        $name = explode(" ", $arg1);

        $this->name = $name;

        $this->fillField('Firstname', $name[0]);
        $this->fillField('Surname', $name[1]);
        $this->fillField('Email', $arg2);

        $this->pressButton('Register');
    }

    /**
     * @Then /^my account is created$/
     */
    public function myAccountIsCreated() {
        $this->assertPageAddress('/register/thanks');
        $this->assertPageContainsText(sprintf('Thanks %s %s', $this->name[0], $this->name[1]));
    }

}
