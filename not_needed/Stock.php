<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/13/12
 * Time: 9:55 PM
 * To change this template use File | Settings | File Templates.
 */
class Stock
{
    public $symb;
    public $buyPrice;

    public function __construct($stock_symbol, $buy_price) {
        $this->symb = $stock_symbol;
        $this->buyPrice = $buy_price;
    }

    public function getSymbol() {
        return $this->symb;
    }

    public function getBuyPrice() {
        return $this->buyPrice;
    }
}

class TestStock {
    public function testConstructorGetSymbolGetBuyPrice(){
        $symbol = "BMW";
        $price = 300;

        $stock = new Stock($symbol, $price);

        if ($stock->getSymbol() == $symbol && $stock->getBuyPrice() == $price)
        echo "PASS";
        else echo "FAILED";
    }
}
