<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/15/12
 * Time: 5:26 PM
 * To change this template use File | Settings | File Templates.
 */
$path = "/home/eyal/Dropbox/Workspace/Code/Learning/PHP/FinalProject/FinalProject/src";
include_once $path . "/obj/Stock.php";

class DbHelperForStock
{
    public $dbUri  = 'mysql:host=127.0.0.1;dbname=Goldenbear';
    public $dbUser = 'eyal';
    public $dbPass = 'eyalpassword';
    public $dbtable = 'stocks';
    public $dbh;

    public function __construct() {
        $this->dbh = new PDO($this->dbUri, $this->dbUser, $this->dbPass, array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ));
    }

    public function insertToDb($username, $stock, $amount, $buyprice) {
        $sql = "INSERT INTO $this->dbtable (Username, Symbol, Amount, BuyPrice) VALUES (?, ?, ?, ?)";
        $stmt = $this->dbh->prepare($sql);
        try {
            $succ = $stmt->execute(array($username, $stock->getSymbol(), $amount, $buyprice));
        }
        catch (Exception $e) {
            echo $e->getTraceAsString();
        }

    }

    public function deleteFromDb($username, $stock) {
        $sql = "DELETE FROM $this->dbtable WHERE Username = ? AND Symbol = ?";
        $stmt = $this->dbh->prepare($sql);
        try {
            $succ = $stmt->execute(array($username, $stock->getSymbol()));
        } catch (Exception $e ) {
            echo $e->getTraceAsString();
        }
    }
    public function countsRowsInDb() {
        $sql = "SELECT count (*) FROM $dbtable";
        $stmt = $this->dbh->prepare($sql);
        try {
            $succ = $stmt->execute();
        } catch (Exception $e ) {
            echo $e->getTraceAsString();
        }
        return $stmt->fetch();
    }

    public function getStocksListForUser($username) {
        $stocksArray = array();

        $sql = "SELECT * FROM $this->dbtable WHERE Username = ?";
        $stmt = $this->dbh->prepare($sql);
        try {
            if ($stmt->execute(array($username))) {
                while ($stockList = $stmt->fetch(PDO::FETCH_ASSOC)){
                    array_push($stocksArray, $stockList);
                }
            }
            return $stocksArray;
        }
        catch (Exception $e) {
            echo $e->getTraceAsString();
        }
    }
    public function updateDb($username, $stock, $newamount) {
        // currently you can only buy a stock once. meaning you cannot update the amount.
        // this is due to the complications around calculating the earnings.
    }
}

class TestDbHelperForStock {
    // test
    public function testGetStocksListForUser() {
        $dbhelp = new DbHelperForStock();
        $dbhelp->insertToDb("Alon", new Stock("Apple", 100), 150, 200);
        //
        echo "number of rows in the DB now is : " . $dbhelp->countsRowsInDb() . "</br>";
    }
}
