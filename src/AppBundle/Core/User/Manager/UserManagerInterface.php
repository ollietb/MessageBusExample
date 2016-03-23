<?php
/**
 * Created by PhpStorm.
 * User: ollie
 * Date: 18/03/2016
 * Time: 14:27
 */

namespace AppBundle\Core\User\Manager;

use AppBundle\Core\Register\RegisterInterface;

interface UserManagerInterface {

    public function register(RegisterInterface $register);
}