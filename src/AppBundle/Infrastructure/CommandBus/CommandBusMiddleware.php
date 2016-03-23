<?php
/**
 * Created by PhpStorm.
 * User: ollie
 * Date: 18/03/2016
 * Time: 14:33
 */

namespace AppBundle\Infrastructure\CommandBus;

use AppBundle\Infrastructure\MessageQueue\FakeQueue;
use SimpleBus\Message\Bus\Middleware\MessageBusMiddleware;

class CommandBusMiddleware implements MessageBusMiddleware {

    /**
     * @var \AppBundle\Infrastructure\MessageQueue\FakeQueue
     */
    private $messageQueue;

    public function __construct(FakeQueue $messageQueue) {
        $this->messageQueue = $messageQueue;
    }

    public function handle($message, callable $next)
    {
        if ($message instanceof MQMessageInterface) {
            // handle the message asynchronously using a message queue
            $this->messageQueue->add($message);
        } else {
            // handle the message synchronously, i.e. right-away
            $next($message);
        }
    }

}