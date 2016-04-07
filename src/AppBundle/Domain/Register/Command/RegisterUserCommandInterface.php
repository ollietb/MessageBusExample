<?php
/**
 * Created by PhpStorm.
 * User: ollie
 * Date: 18/03/2016
 * Time: 12:21
 */

namespace AppBundle\Domain\Register\Command;

use AppBundle\Domain\Register\Register;

interface RegisterUserCommandInterface {

    /**
     * @return Register
     */
    public function getRegister();


}