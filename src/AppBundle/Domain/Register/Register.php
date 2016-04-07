<?php

namespace AppBundle\Domain\Register;

class Register implements RegisterInterface{

    private $firstname;
    private $surname;
    /**
     * @var null
     */
    private $email;

    public function __construct($firstname = null, $surname = null, $email = null) {
        $this->firstname = $firstname;
        $this->surname = $surname;
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getFirstname() {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname = null) {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getSurname() {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname = null) {
        $this->surname = $surname;
    }

    /**
     * @return null
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * @param null $email
     */
    public function setEmail($email = null) {
        $this->email = $email;
    }

}