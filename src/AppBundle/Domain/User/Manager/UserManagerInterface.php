<?php
/**
 * Created by PhpStorm.
 * User: ollie
 * Date: 18/03/2016
 * Time: 14:27
 */

namespace AppBundle\Domain\User\Manager;

use AppBundle\Domain\Register\RegisterInterface;

interface UserManagerInterface {

    public function register(RegisterInterface $register);
}