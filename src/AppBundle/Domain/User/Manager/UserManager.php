<?php
/**
 * Created by PhpStorm.
 * User: ollie
 * Date: 18/03/2016
 * Time: 14:20
 */

namespace AppBundle\Domain\User\Manager;

use AppBundle\Domain\Register\RegisterInterface;
use AppBundle\Domain\User\User;
use AppBundle\Domain\User\Persistence\UserRepositoryInterface;

class UserManager implements UserManagerInterface{


    /**
     * @var UserRepositoryInterface
     */
    private $repository;

    public function __construct(UserRepositoryInterface $repository) {

        $this->repository = $repository;
    }

    public function register(RegisterInterface $register)
    {
        $user = new User();
        $user->setFirstname($register->getFirstname());
        $user->setSurname($register->getSurname());
        $user->setEmail($register->getEmail());

        $this->repository->save($user);
    }
}