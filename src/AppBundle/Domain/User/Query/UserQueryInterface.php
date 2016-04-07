<?php
/**
 * Created by PhpStorm.
 * User: ollie
 * Date: 18/03/2016
 * Time: 16:26
 */

namespace AppBundle\Domain\User\Query;


use AppBundle\Domain\User\User;

interface UserQueryInterface {

    /**
     * @param $firstname
     * @param $surname
     * @return User
     * @throws \InvalidArgumentException
     */
    public function findByName($firstname, $surname);

    /**
     * @param $email
     * @return User
     * @throws \InvalidArgumentException
     */
    public function findByEmail($email);
}