<?php
/**
 * Created by PhpStorm.
 * User: ollie
 * Date: 18/03/2016
 * Time: 14:20
 */

namespace AppBundle\Core\User\Manager;

use AppBundle\Core\Register\RegisterInterface;
use AppBundle\Core\User\Entity\User;
use AppBundle\Core\User\Persistence\UserRepositoryInterface;

class UserManager implements UserManagerInterface{


    /**
     * @var \AppBundle\User\Persistence\UserRepositoryInterface
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

        $this->repository->save($user);
    }
}