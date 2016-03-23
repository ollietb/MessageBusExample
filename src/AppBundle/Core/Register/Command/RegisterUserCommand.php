<?php
/**
 * Created by PhpStorm.
 * User: ollie
 * Date: 18/03/2016
 * Time: 12:21
 */

namespace AppBundle\Core\Register\Command;


use AppBundle\Core\Register\Register;
use AppBundle\Core\Register\RegisterInterface;

class RegisterUserCommand implements RegisterUserCommandInterface{

    /**
     * @var \AppBundle\Core\Register\Register
     */
    private $register;

    public function __construct(RegisterInterface $register) {
        $this->register = $register;
    }

    /**
     * @return Register
     */
    public function getRegister() {
        return $this->register;
    }


}