<?php
/**
 * Created by PhpStorm.
 * User: ollie
 * Date: 18/03/2016
 * Time: 14:57
 */

namespace AppBundle\Core\Register\Command;


use AppBundle\Infrastructure\CommandBus\MQMessageInterface;
use AppBundle\Core\Register\Register;

class RegisterUserCRMCommand implements RegisterUserCommandInterface, MQMessageInterface {

    /**
     * @var \AppBundle\Core\Register\Register
     */
    private $register;

    public function __construct(Register $register) {

        $this->register = $register;
    }

    public function getRegister() {
        return $this->register;
    }

}