<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/13/12
 * Time: 7:18 PM
 * To change this template use File | Settings | File Templates.
 */

$path = "/home/eyal/Dropbox/Workspace/Code/Learning/PHP/FinalProject/FinalProject/src";

include_once $path . "/obj/Position.php";
include_once $path . "/obj/PositionToDB.php";

class Portfolio
{
    public $username;
    // This is an array of the stocks in this portfolio.
    public $positions;
    public $dbPositionHelper;

    // at first i'm limitting the amount to 1
    public $AMOUNT = 1;

    public function __construct($uname) {
        $this->username = $uname;
        $this->positions = array();
        $this->dbPositionHelper = new PositionToDB();
    }

    public function addPosition($position) {
        // The portfolio should not handle the cash
        // add to database
        $this->dbPositionHelper->insertToDb($position);
    }

    public function getPositions() {
        $this->positions = $this->dbPositionHelper->selectPositionsByUser($this->username);
        return $this->positions;
    }

    // remove a position by id
    public function removePosition($positionId) {
        $this->dbPositionHelper->deletePositionById($positionId);
    }

    public function getDbPositionHelper()
    {
        return $this->dbPositionHelper;
    }
}

class TestPortfolio {
    public function testAddPosition() {
        $funame = "TestPortfolio::testAddPosition() : ";
        $pass = "PASS";
        $fail = "FAIL";

        $port = new Portfolio("Eyal");
        $port->addPosition(new Position("Eyal", "Teva", 400, 400));
        $port->addPosition(new Position("Eyal", "Teva", 400, 500));

        if ( $port->getDbPositionHelper()->countRows() == 2)
            echo $funame . $pass . "</br>";
        else echo $funame . $fail . "</br>";

        $port->getDbPositionHelper()->deleteAllRows();
    }

    public function testRemovePosition() {
        $funame = "TestPortfolio::testRemovePosition() : ";
        $pass = "PASS";
        $fail = "FAIL";

        $port = new Portfolio("Eyal");

        $port->getDbPositionHelper()->deleteAllRows();

        $port->addPosition(new Position("Eyal", "Teva", 400, 400));

        $positionsArray = $port->getPositions("Eyal");

        $onlyPosition = $positionsArray[0];

        $port->removePosition($onlyPosition->getId());

        if ( $port->getDbPositionHelper()->countRows() == 0)
            echo $funame . $pass . "</br>";
        else echo $funame . $fail . "</br>";

        $port->getDbPositionHelper()->deleteAllRows();
    }

    public function testGetPositions() {
        $funame = "TestPortfolio::testGetPositions() : ";
        $pass = "PASS";
        $fail = "FAIL";

        $port = new Portfolio("Eyal");

        $port->getDbPositionHelper()->deleteAllRows();

        $port->addPosition(new Position("Eyal", "Teva", 400, 400));

        $positionsArray = $port->getPositions("Eyal");

        $onlyPosition = $positionsArray[0];

        if ( get_class($onlyPosition) == "Position")
            echo $funame . $pass . "</br>";
        else echo $funame . $fail . "</br>";

        $port->getDbPositionHelper()->deleteAllRows();
    }
}








