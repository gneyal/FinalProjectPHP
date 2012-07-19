<?php
if (!isset($_SESSION))
    session_start();

/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/18/12
 * Time: 12:00 PM
 * To change this template use File | Settings | File Templates.
 */

$activeUserId = $_SESSION['activeUserId'];

if (isset($_POST['userIdToPresent']))
    $userIdToPresent = $_POST['userIdToPresent'];
else $userIdToPresent = $activeUserId;

if ($activeUserId == $userIdToPresent)
    $permissions = 'user';
else $permissions = 'guest';

include_once('../obj/UserToDB.php');
include_once('../obj/Calculator.php');

$userToDB = new UserToDB();
$calc = new Calculator();

$user = $userToDB->getUserById($userIdToPresent);

include_once('../views/UserProfile.php');