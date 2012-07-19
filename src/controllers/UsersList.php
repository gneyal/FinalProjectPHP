<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/17/12
 * Time: 5:31 PM
 * To change this template use File | Settings | File Templates.
 */

if (!isset($_SESSION))
    session_start();

$activeUserUsername = $_SESSION['activeUserUsername'];
$activeUserId = $_SESSION['activeUserId'];

include_once('../obj/UserToDB.php');
include_once('../obj/Calculator.php');

$userToDB = new UserToDB();
$calc = new Calculator();

$users = $userToDB->getAllUsers();

$usersProfitArray = $calc->getUsersProfitArray();

    // foreach user: username => (foreach symbol : {symbol => profit}; total=> profit)
include_once('../views/UsersList.php');