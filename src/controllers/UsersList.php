<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/17/12
 * Time: 5:31 PM
 * To change this template use File | Settings | File Templates.
 */

include_once('../obj/UserToDB.php');

$userToDB = new UserToDB();
$users = $userToDB->getAllUsers();


include_once('../views/UsersList.php');