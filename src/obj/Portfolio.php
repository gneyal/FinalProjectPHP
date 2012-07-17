<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/13/12
 * Time: 7:18 PM
 * To change this template use File | Settings | File Templates.
 */

$path = "/home/eyal/Dropbox/Workspace/Code/Learning/PHP/FinalProject/FinalProject/src";

include_once $path . "/models/DbHelperForStock.php";

include_once $path . "/obj/Stock.php";

class Portfolio
{
    public $username;
    // This is an array of the stocks in this portfolio.
    public $stocks;
    public $dbStockHelper;

    // at first i'm limitting the amount to 1
    public $AMOUNT = 1;

    public function __construct($uname) {
        $this->username = $uname;
        $this->stocks = array();
        $this->dbStockHelper = new DbHelperForStock();
    }

    public function addStock($stock) {
        // The portfolio should not handle the cash
        // add to database
        $this->dbStockHelper->insertToDb($this->username, $stock, $this->AMOUNT, $stock->getBuyPrice());
    }

    public function getStocks() {
        $stocksHelper = $this->dbStockHelper->getStocksListForUser($this->username);
        foreach ($stocksHelper as $i => $databaseStockInfo) {
            $stock = new Stock($databaseStockInfo['Symbol'], $databaseStockInfo['BuyPrice']);
            array_push($this->stocks, $stock);
        }
        return $this->stocks;
    }
}

class TestPortfolio {
    public function testAddStockGetStocks() {
        $funame = "TestPortfolio::testAddStockGetStocks() : ";
        $pass = "PASS";
        $fail = "FAIL";

        $port = new Portfolio("Eyal");
        $port->addStock(new Stock("TEVA", 100));
        $port->addStock(new Stock("GolanTele", 100));

        $stocks = $port->getStocks();
        $golan = $stocks['0'];
        $teva = $stocks['1'];
        if ((($teva->getSymbol() == "TEVA" ) ) && ( $golan->getSymbol() == "GolanTele"))
           echo $funame . $pass;
        else echo $funame . $fail;

        echo "</br>";
    }

    public function testGetStocks() {

    }
}








