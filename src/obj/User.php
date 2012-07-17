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
    public $INITIAL_CASH = 1000;

    public $id;
    public $username;
    public $password;
    public $email;
    public $cash;

    public $portfolio;

    public function __construct($user, $pass, $em, $id = 0) {
        $this->username = $user;
        $this->password = $pass;
        $this->email = $em;
        $this->cash = $this->INITIAL_CASH;
        $this->id = $id;

        $this->portfolio = new Portfolio($user);
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

    public function getCash() {
        return $this->cash;
    }

    public function setCash($amount) {
        $this->cash = $amount;
    }

    public function buyStock($stock) {
        // if not in the portfolio
        // if you have enough cash
        // substract the cash accordingly

        $this->cash -= $stock->getBuyPrice();
        // add the stock to the protfolio

    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }
}



class TestUser
{

}
