<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/12/12
 * Time: 1:10 PM
 * To change this template use File | Settings | File Templates.
 */
    include_once "UserToDBOriginal.php";

    $valid = false;

    $dbHelper = new DbHelper();
    $realuser = $dbHelper->getUserByUsername($username);

    if ($realuser) {
        if (md5($password) == $realuser['password'])
            $valid = true;
    }
    // get the real User from the DB by the username the user has entered
    // see if that username is in the DB.
    // if its not in the database, show the BadMessage view.
    // if it is in the database:
    //  if the password is correct - forward to the newsfeed view.
    //  else forward to BadMessage view with appropriate $message

