<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/13/12
 * Time: 11:28 AM
 * To change this template use File | Settings | File Templates.
 */
    include_once "../obj/User.php";
    include_once "DbHelper.php";

    $user1 = new User("Oleg", "123456", "oleg@oleg.com");
    $dbhelper = new DbHelper();

//    $dbhelper->deleteFromDb($user1);
//
    $dbhelper->insertToDb($user1);
//
//    $user1->setEmail("olegsmom@oleg.com");
//
//    $dbhelper->updateDb($user1);


    $newuser = $dbhelper->getUserByUsername("Oleg1");
    var_dump($newuser);



