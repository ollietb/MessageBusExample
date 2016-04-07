<?php

use AppBundle\Domain\Register\Command\RegisterUserCommand;
use AppBundle\Domain\Register\Handler\RegisterUserCommandHandler;
use AppBundle\Domain\Register\Register;
use AppBundle\Domain\User\Query\UserQueryInterface;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
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

    private $email;

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
        $user = $this->userQuery->findByEmail($this->email);

    }

    /**
     * @When /^I register with the name "([^"]*)" and email "([^"]*)"$/
     */
    public function iRegisterWithTheName($arg1, $arg2) {
        $name = explode(" ", $arg1);

        $this->name = $name;
        $this->email = $arg2;

        $register = new Register($name[0], $name[1], $arg2);

        $registration = new RegisterUserCommand($register);

        $this->registerHandler->handle($registration);
    }
}
