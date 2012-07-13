<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/12/12
 * Time: 1:42 PM
 * To change this template use File | Settings | File Templates.
 */
    include_once "../obj/User.php";
    include_once "../models/DbHelper.php";

    $user = new User($_POST['username'], $_POST['password'], $_POST['email']);

    include_once "../models/Signup.php";
    include_once "../views/NewsFeed.php";


