<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/12/12
 * Time: 1:08 PM
 * To change this template use File | Settings | File Templates.
 */

    $username = $_POST['username'];
    $password = $_POST['password'];

    include_once('../models/Login.php');

    if ($valid == true)
        include_once('../views/NewsFeed.php');
    else include_once('../views/Login.php');