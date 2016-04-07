<?php
/**
 * Created by PhpStorm.
 * User: ollie
 * Date: 18/03/2016
 * Time: 14:50
 */

namespace AppBundle\Domain\Register\EventSubscriber;


use AppBundle\Domain\Register\Command\RegisterUserCommandInterface;
use AppBundle\Domain\Register\Command\RegisterUserCRMCommand;
use SimpleBus\Message\Bus\Middleware\MessageBusSupportingMiddleware;

class CRMSubscriber implements RegisterSubscriberInterface {


    /**
     * @var \SimpleBus\Message\Bus\Middleware\MessageBusSupportingMiddleware
     */
    private $messageBus;

    public function __construct(MessageBusSupportingMiddleware $messageBus) {

        $this->messageBus = $messageBus;
    }

    public function handle(RegisterUserCommandInterface $register) {

        $register = $register->getRegister();

        $registerCRMCommand = new RegisterUserCRMCommand($register);

        $this->messageBus->handle($registerCRMCommand);

    }
}