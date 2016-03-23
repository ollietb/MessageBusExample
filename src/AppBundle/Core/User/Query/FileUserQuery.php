<?php
/**
 * Created by PhpStorm.
 * User: ollie
 * Date: 18/03/2016
 * Time: 16:26
 */

namespace AppBundle\Core\User\Query;


use AppBundle\Core\User\Entity\User;

class FileUserQuery implements UserQueryInterface {

    protected $fileQueue;

    /**
     * @var User[]
     */
    protected $storage;

    /**
     * @param $firstname
     * @param $surname
     * @return mixed
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
}