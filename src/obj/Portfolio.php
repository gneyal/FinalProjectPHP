<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/13/12
 * Time: 7:18 PM
 * To change this template use File | Settings | File Templates.
 */
class Portfolio
{
    // This is an array of the stocks in this portfolio.
    public $stocks;

    public function __construct() {
        $this->stocks = array();
    }

    public function addStock($stock) {
        array_push($this->stocks, $stock);
    }

    public function getStocks() {
        return $this->stocks;
    }
}



