<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/12/12
 * Time: 1:08 PM
 * To change this template use File | Settings | File Templates.
 */
    // 1. if post is not empty
    // 1.1 if post is valid:
    // 1.1.1 start a new session
    // 1.1.2 proceed to ../controllers/UsersList.php
    // 1.2 else proceed to login screen again (until login succeed)
    // 2. else show the login view.

    if( (isset($_POST['username'])) && (isset($_POST['password'])) ) {
        session_start();
        $_SESSION = array();
        $username = $_POST['username'];
        $password = $_POST['password'];

        include_once('../models/Login.php');

        if ($valid == true) {
            $_SESSION['activeUserId'] = $realuser->getId();
            $_SESSION['activeUserUsername'] = $username;

            include_once('../controllers/UsersList.php');
        }
        else {
            include_once('../views/Login.php');
        }
    }
    else include_once ('../views/Login.php');

