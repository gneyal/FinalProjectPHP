<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/17/12
 * Time: 3:05 PM
 * To change this template use File | Settings | File Templates.
 */
?>


<!DOCTYPE html>
<html>
<head>
    <title>Bears List</title>
</head>
<body>
<h1>Bears List</h1>

<ul>
    <?php foreach ($users as $i => $user) { ?>
    <ul>
        <li>Name: <?php echo $user->getUsername(); ?></li>
        <li>Email: <?php echo $user->getEmail(); ?></li>
        <li>Portfolio profit: <?php echo $user->getEmail(); ?></li>
    </ul>
    <?php } ?>
</ul>

<h2></h2>
</html>