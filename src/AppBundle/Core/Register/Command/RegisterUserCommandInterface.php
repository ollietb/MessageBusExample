<?php
/**
 * Created by PhpStorm.
 * User: ollie
 * Date: 18/03/2016
 * Time: 12:21
 */

namespace AppBundle\Core\Register\Command;

use AppBundle\Core\Register\Register;

interface RegisterUserCommandInterface {

    /**
     * @return Register
     */
    public function getRegister();


}