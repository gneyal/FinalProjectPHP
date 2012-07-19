<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/18/12
 * Time: 4:55 PM
 * To change this template use File | Settings | File Templates.
 */

?>

<!DOCTYPE html>
<html>
<head>
    <title>StocksList</title>
</head>
<body>
<?php include_once "ActiveUserBySession.php"; ?>
<ul>
    <li><a href="../controllers/Logout.php">Logout</a></li>
    <li><a href="../controllers/UsersList.php">Users List</a></li>
    <li><a href="../controllers/UserProfile.php">My Profile</a></li>
</ul>
<h1>StocksList</h1>
<?php foreach( $objYahooStock->getQuotes() as $code => $stock) { ?>
    <ul>
        <li>Code: <?php echo $stock[0]; ?> </li>
        <li>Name: <?php echo $stock[1]; ?> </li>
        <li>Last Trade Price: <?php echo $stock[2]; ?> </li>
        <li>Last Trade Date: <?php echo $stock[3]; ?>  </li>
        <li>Last Trade Time: <?php echo $stock[4]; ?> </li>
        <li>Change and Percent Change: <?php echo $stock[5]; ?> </li>
        <li>Volume: <?php echo $stock[6]; ?> </li>
        <form method="post" action="../controllers/BuyAction.php">
            <input type="text" name="amount" />
            <input type="hidden" name="userid" value="<?php echo($_SESSION['activeUserId']); ?>" />
            <?php $sym = substr($stock[0],1,-1); ?>
            <input type="hidden" name="symbol" value="<?php echo($sym);?>" />
            <input type="hidden" name="price" value="<?php echo $stock[2]; ?>" />
            <input type="submit" value="Buy" />
        </form>
    </ul>
    <?php } ?>

</body>
</html>