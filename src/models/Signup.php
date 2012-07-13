<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/12/12
 * Time: 1:53 PM
 * To change this template use File | Settings | File Templates.
 */
    // TODO: Get the contact information (from the form - found in $_POST)
    $dbhelp = new DbHelper();

    $dbhelp->insertToDb($user);
    // TODO: Return ok if everything ok or,
    // TODO: if validation fails, return that something is wrong

