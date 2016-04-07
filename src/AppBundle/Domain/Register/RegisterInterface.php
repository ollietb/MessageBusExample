<?php

namespace AppBundle\Domain\Register;

interface RegisterInterface {

    /**
     * @return mixed
     */
    public function getFirstname();

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname = null);

    /**
     * @return mixed
     */
    public function getSurname();

    /**
     * @param mixed $surname
     */
    public function setSurname($surname = null);


    /**
     * @return mixed
     */
    public function getEmail();

    /**
     * @param mixed $email
     */
    public function setEmail($email = null);

}