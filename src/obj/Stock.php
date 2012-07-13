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

    public function __construct($stock_symbol) {
        $this->symb = $stock_symbol;
    }

    public function getSymbol() {
        return $this->symb;
    }
}
