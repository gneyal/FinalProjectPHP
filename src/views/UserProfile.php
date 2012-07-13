<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/11/12
 * Time: 11:39 AM
 * To change this template use File | Settings | File Templates.
 */

?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
</head>
<body>
    <h1>User Name</h1>

    <!-- user picture -->
    <img src="" alt="user image">

    <!-- user graph -->
    <img src="" alt="user graph">

    <ul>
        <?php $stocks = $user->portfolio->getStocks(); ?>
        <?php foreach ($stocks as $key => $stock) { ?>
        <?php $stockName = $stock->getSymbol(); ?>
        <li>Stock name: <?php echo "$stockName"; ?></li>
        <?php } ?>
    </ul>

    <?php

    // TODO: calculate earnings (in model)
    // TODO: present earnings

    ?>

</body>
</html>