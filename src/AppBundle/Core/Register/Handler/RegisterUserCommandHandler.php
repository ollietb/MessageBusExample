<?php
/**
 * Created by PhpStorm.
 * User: ollie
 * Date: 18/03/2016
 * Time: 12:24
 */

namespace AppBundle\Core\Register\Handler;


use AppBundle\Core\Register\Command\RegisterUserCommandInterface;
use AppBundle\Core\User\Manager\UserManagerInterface;

class RegisterUserCommandHandler {


    /**
     * @var \AppBundle\Core\User\Manager\UserManagerInterface
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