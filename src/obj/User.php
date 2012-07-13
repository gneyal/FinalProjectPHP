<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/12/12
 * Time: 2:06 PM
 * To change this template use File | Settings | File Templates.
 */

include_once 'Portfolio.php';

class User
{
    public $username;
    public $password;
    public $email;

    public $portfolio;

    public function __construct($user, $pass, $em) {
        $this->username = $user;
        $this->password = $pass;
        $this->email = $em;
        $this->portfolio = new Portfolio();
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getUsername()
    {
        return $this->username;
    }
}
