<?php
/**
 * Created by PhpStorm.
 * User: ollie
 * Date: 18/03/2016
 * Time: 12:21
 */

namespace AppBundle\Domain\Register\Command;


use AppBundle\Domain\Register\Register;
use AppBundle\Domain\Register\RegisterInterface;

class RegisterUserCommand implements RegisterUserCommandInterface{

    /**
     * @var \AppBundle\Domain\Register\Register
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