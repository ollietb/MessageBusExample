<?php
/**
 * Created by PhpStorm.
 * User: ollie
 * Date: 18/03/2016
 * Time: 12:24
 */

namespace AppBundle\Domain\Register\Handler;


use AppBundle\Domain\Register\Command\RegisterUserCommandInterface;
use AppBundle\Domain\User\Manager\UserManagerInterface;

class RegisterUserCommandHandler {


    /**
     * @var \AppBundle\Domain\User\Manager\UserManagerInterface
     */
    private $manager;

    public function __construct(UserManagerInterface $manager) {
        $this->manager = $manager;
    }

    public function handle(RegisterUserCommandInterface $registerUserCommand)
    {
        $this->manager->register($registerUserCommand->getRegister());
    }
}