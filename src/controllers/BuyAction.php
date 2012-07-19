<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/18/12
 * Time: 6:02 PM
 * To change this template use File | Settings | File Templates.
 */

include_once '../obj/UserToDB.php';
include_once '../obj/Calculator.php';

$userToDB = new UserToDB();

/*
 * Getting the buying action information from the form
 */

$userid = $_POST['userid'];
$symbol = $_POST['symbol'];
$amount = $_POST['amount'];
$price = $_POST['price'];

/*
 * Getting the right user to update
 */
$user = $userToDB->getUserById($userid);
$user->buyStock($symbol, $amount, $price);

/*
 * Updating the user in the DB
 */
$userToDB->updateUser($user);

/*
 * presenting the user page after the action.
 */

$calc = new Calculator();
//include_once "../views/UserProfile.php";
include_once "../controllers/UserProfile.php";

