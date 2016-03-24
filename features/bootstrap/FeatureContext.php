<?php

use AppBundle\Core\Register\Command\RegisterUserCommand;
use AppBundle\Core\Register\Handler\RegisterUserCommandHandler;
use AppBundle\Core\Register\Register;
use AppBundle\Core\User\Query\UserQueryInterface;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Symfony2Extension\Context\KernelAwareContext;
use Behat\Symfony2Extension\Context\KernelDictionary;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext, KernelAwareContext
{
    use KernelDictionary;

    /**
     * @var RegisterUserCommandHandler
     */
    private $registerHandler;

    /**
     * @var UserQueryInterface
     */
    private $userQuery;

    private $name = [];

    /**
     * @Given /^I am registering$/
     */
    public function iAmRegistering() {

        $userManager = $this->getContainer()->get('app.user_manager');
        $this->registerHandler = new RegisterUserCommandHandler($userManager);
        $this->userQuery = $this->getContainer()->get('app.user_query');

    }


    /**
     * @Then /^my account is created$/
     */
    public function myAccountIsCreated() {

        // throws exception if not found
        $user = $this->userQuery->findByName($this->name[0], $this->name[1]);

    }

    /**
     * @When /^I register with the name "([^"]*)"$/
     */
    public function iRegisterWithTheName($arg1) {
        $name = explode(" ", $arg1);

        $this->name = $name;

        $register = new Register($name[0], $name[1]);

        $registration = new RegisterUserCommand($register);

        $this->registerHandler->handle($registration);
    }
}
