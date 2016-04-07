<?php
/**
 * Created by PhpStorm.
 * User: ollie
 * Date: 18/03/2016
 * Time: 14:14
 */

namespace AppBundle\Domain\User\Persistence;


use AppBundle\Domain\User\User;

interface UserRepositoryInterface {


    /**
     * @param \AppBundle\Domain\User\User $user
     * @return mixed
     */
    public function save(User $user);

}