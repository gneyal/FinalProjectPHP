<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/16/12
 * Time: 7:12 PM
 * To change this template use File | Settings | File Templates.
 */
class Position
{
    private $id; // the id is assigned by MySql
    private $username;
    private $symbol;
    private $amount;
    private $buyPrice;

    public function __construct( $username, $symbol, $amount, $buyPrice, $id = 0) {
        $this->id = $id;
        $this->username = $username;
        $this->symbol = $symbol;
        $this->amount = $amount;
        $this->buyPrice = $buyPrice;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getBuyPrice()
    {
        return $this->buyPrice;
    }

    public function getSymbol()
    {
        return $this->symbol;
    }

    public function getUsername()
    {
        return $this->username;
    }
    public function getId() {
        return $this->id;
    }
}
