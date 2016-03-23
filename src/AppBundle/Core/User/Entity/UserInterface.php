<?php
/**
 * Created by PhpStorm.
 * User: ollie
 * Date: 18/03/2016
 * Time: 14:16
 */

namespace AppBundle\Core\User\Entity;


interface UserInterface {

    public function getFirstname();

    public function getSurname();

    public function setFirstname($firstname = null);

    public function setSurname($firstname = null);
}