<?php
/**
 * Created by PhpStorm.
 * User: ollie
 * Date: 18/03/2016
 * Time: 14:44
 */

namespace AppBundle\Infrastructure\MessageQueue;


class FakeQueue {

    private $queue;

    public function __construct() {
        $this->fileQueue = fopen(__DIR__.'/queue.txt', 'w+');
    }

    public function add($message) {
        $this->queue[] = $message;
        fputs($this->fileQueue, serialize($this->queue));
    }

    function __destruct() {
        fclose($this->fileQueue);
    }
}