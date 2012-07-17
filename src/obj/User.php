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

    public $username;
    public $password;
    public $email;
    public $cash;

    public $portfolio;

    public function __construct($user, $pass, $em) {
        $this->username = $user;
        $this->password = $pass;
        $this->email = $em;
        $this->cash = $this->INITIAL_CASH;

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
}

include_once 'Stock.php';

class TestUser {

    public function testBuyStock() {
        $username = "Assaf";
        $password = "password";
        $email = "assaf@assaf";
        $user = new User($username, $password, $email);

        $stockSymbol = "Intel";
        $buyPrice = 100;

        $stockToBuy = new Stock($stockSymbol, $buyPrice);
        $user->buyStock($stockToBuy);

        $msg1 = "After buying $stockSymbol the cash in $username should be ".$user->INITIAL_CASH-$buyPrice;
        echo "$msg1"."</br>";

        $msg2 = "Actual cash is : ";
        echo "$msg2".$user->getCash();

    }
}
