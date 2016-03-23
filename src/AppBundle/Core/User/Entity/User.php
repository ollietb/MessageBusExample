<?php
/**
 * Created by PhpStorm.
 * User: ollie
 * Date: 18/03/2016
 * Time: 14:15
 */

namespace AppBundle\Core\User\Entity;


class User {
    private $firstname;
    private $surname;


    /**
     * @return mixed
     */
    public function getFirstname() {
        return $this->firstname;
    }

    /**
     * @return mixed
     */
    public function getSurname() {
        return $this->surname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname = null) {
        $this->firstname = $firstname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname = null) {
        $this->surname = $surname;
    }

    public function getFullName() {
        return $this->getFirstname() . ' ' . $this->getSurname();
    }

}