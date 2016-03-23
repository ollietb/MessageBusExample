<?php
/**
 * Created by PhpStorm.
 * User: ollie
 * Date: 18/03/2016
 * Time: 16:26
 */

namespace AppBundle\Core\User\Query;


use AppBundle\Core\User\Entity\User;

interface UserQueryInterface {

    /**
     * @param $firstname
     * @param $surname
     * @return User
     * @throws \InvalidArgumentException
     */
    public function findByName($firstname, $surname);

}