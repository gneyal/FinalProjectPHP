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

//    include_once $path . "/models/UserToDBOriginal.php";
    include_once $path . "/obj/User.php";
    include_once $path . "/obj/UserToDB.php";

    include_once $path . "/obj/Portfolio.php";
    include_once $path . "/obj/Position.php";
    include_once $path . "/obj/PositionToDB.php";

    function testPortfolio() {
        $test1 = new TestPortfolio();

        $test1->testAddPosition();
        $test1->testRemovePosition();
        $test1->testGetPositions();
    }

    function testPositionToDB() {
        $testPositionToDB = new TestPositionToDB();

        $testPositionToDB->testInsertToDb();
        $testPositionToDB->testSelectPositionsByUser();
        $testPositionToDB->testDeleteFromDb();
    }

    function testUserToDB() {
        $testUserToDB = new TestUserToDB();

        $testUserToDB->testInsertToDB();
        $testUserToDB->testGetUserById();
        $testUserToDB->testUpdateUser();
    }

//    testPortfolio(); // tested

//    testPositionToDB(); // tested: I think it's ok for now.

    testUserToDB();
?>