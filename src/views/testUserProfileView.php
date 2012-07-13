<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/13/12
 * Time: 10:21 PM
 * To change this template use File | Settings | File Templates.
 */
    include_once "../obj/User.php";
    include_once "../obj/Stock.php";

    $user = new User("eyal", "123", "eyal@eyal");
    $user->portfolio->addStock(new Stock("Google"));

    include_once "UserProfile.php";
?>