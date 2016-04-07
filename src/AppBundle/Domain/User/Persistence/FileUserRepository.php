<?php
/**
 * Created by PhpStorm.
 * User: ollie
 * Date: 18/03/2016
 * Time: 14:14
 */

namespace AppBundle\Domain\User\Persistence;


use AppBundle\Domain\User\User;

class FileUserRepository implements UserRepositoryInterface {

    protected $fileQueue;

    /**
     * @var User[]
     */
    private $storage;

    public function __construct() {
        $this->fileQueue = fopen(__DIR__.'/storage.txt', 'w');
        $this->storage = [];
    }

    public function save(User $user) {
        $this->storage[] = $user;
        fwrite($this->fileQueue, serialize($this->storage));
    }

    function __destruct() {
        fclose($this->fileQueue);
    }
}