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

    public function __construct($user, $pass, $em, $id = 0, $cash = 1000000) {
        $this->username = $user;
        $this->password = $pass;
        $this->email = $em;
        $this->cash = $cash;
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

    // after changing the user state (for example the cash)
    // you should use UserToDB->updateUser function
    public function buyStock($symbol, $amount, $buyprice) {
        // if not in the portfolio
        // if you have enough cash
        // substract the cash accordingly

        $this->cash -= $buyprice * $amount;

        // add the stock to the protfolio
        $position = new Position($this->username, $symbol, $amount, $buyprice);
        $this->portfolio->addPosition($position);
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPortfolio()
    {
        return $this->portfolio;
    }
}

class TestUser
{

}
