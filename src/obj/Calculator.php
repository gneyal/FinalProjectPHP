<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/18/12
 * Time: 9:41 AM
 * To change this template use File | Settings | File Templates.
 */
$path = "/home/eyal/Dropbox/Workspace/Code/Learning/PHP/FinalProject/FinalProject/src";

include_once $path . "/obj/UserToDB.php";
include_once $path . "/obj/User.php";
include_once $path . "/obj/PositionToDB.php";

class Calculator
{
    public $userToDB;

    public function __construct() {
        $this->userToDB = new UserToDB();
    }


    public function getUsersProfitArray() {
        $userProfitArray = array();

        $users = $this->userToDB->getAllUsers();
        foreach ($users as $user) {
            $total = 0;
            $portfolio = $user->getPortfolio();
            $positions = $portfolio->getPositions();
            $positionProfitArray = array();
            // get all positions profit
            foreach ($positions as $position) {
                $profitForPosition = $this->getCurrentPrice($position);
                $positionProfitArray[$position->getId()] = $profitForPosition;
                $total += $profitForPosition;
            }
            $positionProfitArray['total'] = $total;
            $userProfitArray[$user->getUsername()] = $positionProfitArray;
        }
        return $userProfitArray;
    }

    public function getCurrentPrice($position) {
        // for the meantime i'll return a random number - It should return the real current price from Yahoo!
        $random_number = rand(1, 10);
        return $random_number;
    }

    public function getPositionProfit($username, $positionId) {
        $usersProfitArray = $this->getUsersProfitArray();
        if ($usersProfitArray[$username][$positionId])
            return $usersProfitArray[$username][$positionId];
        else return false;
    }
}

class TestCalculator
{
    // should change this unit test as i have changed the array returned by this function.abstract
    // it is now: username=>positionId=>profit
    // before it was: username => positionName => profit.
    public function testGetUsersProfitArray() {
        // 0. normal usage
        // =====================
        // a. create a user
        // b. add 3 positions to this user
        // c. get
        $userToDB = new UserToDB();
        $userToDB->deleteAllRows();

        $positionToDB = new PositionToDB();
        $positionToDB->deleteAllRows();

        $user1 = new User("Eyal", 123, "eyal@eyal");
        $userToDB->insertToDb($user1);

        $user1->buyStock("Delek", 100, 40);

        $calc = new Calculator();

        $ar = $calc->getUsersProfitArray();
        var_dump($ar);
        $eyalprofit = $ar['Eyal'];
        if ($eyalprofit['Delek'] > 0)
            echo "PASS";
        else echo "FAIL";
//        var_dump($calc->getUsersProfitArray());
        // =====================
        // 1. if no users
        // 2. if one user has no positions
    }
}
