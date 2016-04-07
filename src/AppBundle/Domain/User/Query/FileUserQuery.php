<?php
/**
 * Created by PhpStorm.
 * User: ollie
 * Date: 18/03/2016
 * Time: 16:26
 */

namespace AppBundle\Domain\User\Query;


use AppBundle\Domain\User\User;

class FileUserQuery implements UserQueryInterface {

    protected $fileQueue;

    /**
     * @var User[]
     */
    protected $storage;

    /**
     * @param $firstname
     * @param $surname
     * @return User
     * @throws \InvalidArgumentException
     */
    public function findByName($firstname, $surname)
    {
        $this->fileQueue = fopen(__DIR__.'/../Persistence/storage.txt', 'r');

        $content = fread($this->fileQueue, 10000);

        $this->storage = (array) unserialize($content);

        foreach($this->storage as $item)
        {
            if($item->getFirstname() == $firstname && $item->getSurname() == $surname)
            {
                return $item;
            }
        }

        throw new \InvalidArgumentException('User not found');
    }

    /**
     * @param $email
     * @return User
     * @throws \InvalidArgumentException
     */
    public function findByEmail($email)
    {
        $this->fileQueue = fopen(__DIR__.'/../Persistence/storage.txt', 'r');

        $content = fread($this->fileQueue, 10000);

        $this->storage = (array) unserialize($content);

        foreach($this->storage as $item)
        {
            if($item->getEmail() == $email)
            {
                return $item;
            }
        }

        throw new \InvalidArgumentException('User not found');
    }
}