<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/16/12
 * Time: 11:05 AM
 * To change this template use File | Settings | File Templates.
 */

////////////////////////////////////////////////////////////////////////
// HOW to use this file:
// 1. include the file you want to test.
// 2. for every file/ object you want to test, you need to provide a TestObject -
// I call it by the same name, with the Prefix "Test". in this class create your UnitTests
// 3. in this file create a function called "testYourObject"
// 4. in this function have one variable instatiated with TestYourObject
// 5. call from this variable to all the UnitTests you have coded in the class TestYourObject
///////////////////////////////////////////////////////////////////////

    $path = "/home/eyal/Dropbox/Workspace/Code/Learning/PHP/FinalProject/FinalProject/src";

    include_once $path . "/models/DbHelper.php";
    include_once $path . "/models/DbHelperForStock.php";
    include_once $path . "/obj/User.php";
    include_once $path . "/obj/Stock.php";
    include_once $path . "/obj/Portfolio.php";
    include_once $path . "/obj/Position.php";
    include_once $path . "/obj/PositionToDB.php";

    function testStock() {
        $testStock = new TestStock();
        $testStock->testConstructorGetSymbolGetBuyPrice();

    }

    function testPortfolio() {
        $test1 = new TestPortfolio();
        $test1->testAddStockGetStocks();
    }

    function testDbHelper() {
        $testDbHelper = new TestDbHelper();

        $testDbHelper->testInsertToDb();
        //$testDbHelper->testDeleteFromDb();
        $testDbHelper->testUpdateDb();
    }

    function testDbHelpterForStock() {
        $testDbHelperForStock = new TestDbHelperForStock();
        $testDbHelperForStock->testGetStocksListForUser();
    }

    function testUser() {
        $testUser = new TestUser();
        $testUser->testBuyStock();
    }

    function testPositionToDB() {
        $testPositionToDB = new TestPositionToDB();
        $testPositionToDB->testInsertToDb();
        $testPositionToDB->testSelectPositionsByUser();
    }

//    testStock();
//    testPortfolio();
//    testDbHelpterForStock();
//
//    testUser();
//    testDbHelper();
    testPositionToDB();
?>