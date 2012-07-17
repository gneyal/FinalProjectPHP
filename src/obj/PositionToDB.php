<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/16/12
 * Time: 7:32 PM
 * To change this template use File | Settings | File Templates.
 */
class PositionToDB
{
    public $dbUri  = 'mysql:host=127.0.0.1;dbname=Goldenbear';
    public $dbUser = 'eyal';
    public $dbPass = 'eyalpassword';
    public $dbTable = 'Positions';
    public $dbh;

    public function __construct() {
        $this->dbh = new PDO($this->dbUri, $this->dbUser, $this->dbPass, array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ));
    }

    // insert User to DB
    public function insertToDb($position) {
        $sql = "INSERT INTO $this->dbTable (Username, Symbol, Amount, BuyPrice) VALUES (?, ?, ?, ?)";
        $stmt = $this->dbh->prepare($sql);
        try {
            $succ = $stmt->execute(array($position->getUsername(), $position->getSymbol(),
            $position->getAmount(), $position->getBuyPrice()));
        } catch (Exception $e) {
            echo $e->getTraceAsString();
        }
    }

    public function selectPositionsByUser($user) {
        $positionsArray = array();

        $sql = "SELECT * FROM $this->dbTable WHERE Username = ?";
        $stmt = $this->dbh->prepare($sql);
        try {
            if ($stmt->execute(array($user))) {
                while ($positionMatch = $stmt->fetch(PDO::FETCH_ASSOC)){
                    array_push($positionsArray, $positionMatch);
                }
            }
            return $positionsArray;
        }
        catch (Exception $e) {
            echo $e->getTraceAsString();
        }
    }

    public function countRows() {
        $sql = "SELECT count(*) FROM $this->dbTable";
        $ans = $this->dbh->query($sql)->fetchColumn();;
        return $ans;
    }

    public function deleteAllRows() {
        $sql = "DELETE FROM $this->dbTable WHERE id > 0";
        $this->dbh->query($sql);
    }
}

class TestPositionToDb {
    public function testInsertToDb() {
        $funame = "TestPositionToDB::testInsertToDb() " . "</br>";
        $pass = "PASS";
        $fail = "FAIL";

        $username = "Sagy";
        $symbol = "AMPM";
        $amount = 400;
        $buyprice = 100;

        $newposition = new Position($username, $symbol, $amount, $buyprice);
        $positionTodb = new PositionToDB();

        $positionTodb->insertToDb($newposition);

        if ( $positionTodb->countRows() == 1 )
            echo $funame . $pass . "</br>";
        else echo $funame . $fail . "</br>";

        $positionTodb->deleteAllRows();
    }

    public function testSelectPositionsByUser() {
        $funame = "TestPositionToDB::testSelectPositionsByUser() " . "</br>";
        $pass = "PASS";
        $fail = "FAIL";

        $username = "Sagy";
        $symbol = "AMPM";
        $amount = 400;
        $buyprice = 100;

        $newposition = new Position($username, $symbol, $amount, $buyprice);
        $positionTodb = new PositionToDB();

        $positionTodb->insertToDb($newposition);
        $positionTodb->insertToDb($newposition);

        $positionsToUser = $positionTodb->selectPositionsByUser($username);
        if ( $positionsToUser[0]['Username'] == 'Sagy' &&  $positionsToUser[1]['Amount'] == 400)
            echo $funame . $pass . "</br>";
        else echo $funame . $fail . "</br>";

        $positionTodb->deleteAllRows();
    }
//    public function testDeleteFromDb() {
//        $funame = "TestPositionToDB::testInsertToDb() " . "</br>";
//        $pass = "PASS";
//        $fail = "FAIL";
//
//        $username = "Sagy";
//        $symbol = "AMPM";
//        $amount = 400;
//        $buyprice = 100;
//
//        $newposition = new Position($username, $symbol, $amount, $buyprice);
//        $positionTodb = new PositionToDB();
//
//        $positionTodb->insertToDb($newposition);
//        $positionTodb->

//    }
}
