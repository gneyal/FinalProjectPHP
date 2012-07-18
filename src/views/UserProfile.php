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
    <h1>User Profile Page</h1>

    <!-- user picture -->
    <img src="" alt="user image">

    <!-- user graph -->
    <img src="../../img/sample_stock_graph.jpg" alt="user graph">

    <ul>
        <li><?php echo $user->getUsername(); ?></li>
        <li><?php echo $user->getEmail(); ?></li>
        <li><?php echo $user->getCash(); ?></li>
    </ul>
    <ul>
        <?php $positions = $user->portfolio->getPositions(); ?>
        <?php foreach ($positions as $key => $position) { ?>
        <?php $symbol = $position->getSymbol(); ?>
        <li>Symbol: <?php echo "$symbol"; ?></li>
        <?php $profitForPosition = $calc->getPositionProfit($user->getUsername(), $position->getId()) ?>
        <li>Profit: <?php echo $profitForPosition; ?></li>
        <li><a href="#">Sell</a></li>
        <?php } ?>
    </ul>

    <?php

    // TODO: calculate earnings (in model)
    // TODO: present earnings

    ?>

</body>
</html>