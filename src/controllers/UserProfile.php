<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/18/12
 * Time: 12:00 PM
 * To change this template use File | Settings | File Templates.
 */

include_once('../obj/UserToDB.php');
include_once('../obj/Calculator.php');

$userToDB = new UserToDB();
$calc = new Calculator();

$users = $userToDB->getAllUsers();
// for now lets present only the first user
$user = $users[0];

include_once('../views/UserProfile.php');