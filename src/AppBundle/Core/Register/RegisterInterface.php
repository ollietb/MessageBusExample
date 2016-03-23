<?php

namespace AppBundle\Core\Register;

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

}