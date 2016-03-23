<?php

namespace AppBundle\Core\Register;

class Register implements RegisterInterface{

    private $firstname;
    private $surname;

    public function __construct($firstname = null, $surname = null) {
        $this->firstname = $firstname;
        $this->surname = $surname;
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

}