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
    <?php include_once "ActiveUserBySession.php"; ?>
    <ul>
        <li><a href="../controllers/Logout.php">Logout</a></li>
        <li><a href="../controllers/UsersList.php">UsersList</a></li>
        <li><a href="../controllers/StockList.php">StocksList</a></li>
    </ul>
    <h1>User Profile Page</h1>

    <!-- user picture -->
    <img src="" alt="user image">

    <!-- user graph -->
    <img src="../../img/sample_stock_graph.jpg" alt="user graph">

    <h2>User Details:</h2>
    <ul>
        <li><?php echo $user->getUsername(); ?></li>
        <li><?php echo $user->getEmail(); ?></li>
        <li><?php echo $user->getCash(); ?></li>
    </ul>
    <h2>User Positions:</h2>
    <ul>
        <?php $positions = $user->portfolio->getPositions(); ?>
        <?php foreach ($positions as $key => $position) { ?>
        <?php $symbol = $position->getSymbol(); ?>
        <li>Symbol: <?php echo "$symbol"; ?></li>
        <?php $profitForPosition = $calc->getPositionProfit($user->getUsername(), $position->getId()) ?>
        <li>Profit: <?php echo $profitForPosition; ?></li>
        <?php if ($permissions == 'user') { ?>
        <li><a href="#">Sell</a></li>
        <?php } ?>

        <?php } ?>
    </ul>

    <?php

    // TODO: calculate earnings (in model)
    // TODO: present earnings

    ?>

</body>
</html>