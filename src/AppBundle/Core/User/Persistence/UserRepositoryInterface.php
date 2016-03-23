<?php
/**
 * Created by PhpStorm.
 * User: ollie
 * Date: 18/03/2016
 * Time: 14:14
 */

namespace AppBundle\Core\User\Persistence;


use AppBundle\Core\User\Entity\User;

interface UserRepositoryInterface {


    /**
     * @param \AppBundle\Core\User\Entity\User $user
     * @return mixed
     */
    public function save(User $user);

}