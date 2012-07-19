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
<?php include_once "ActiveUserBySession.php"; ?>
<ul>
    <li><a href="../controllers/Logout.php">Logout</a></li>
    <li><a href="../controllers/UserProfile.php">My Profile</a></li>
    <li><a href="../controllers/StockList.php">StocksList</a></li>
</ul>
<h1>Bears List</h1>

<ul>
    <?php foreach ($users as $i => $user) { ?>
    <ul>
        <li>Name: <?php echo $user->getUsername(); ?></li>
        <li>Email: <?php echo $user->getEmail(); ?></li>
        <?php
//            $usersProfitArray = $usersProfit->getUsersProfitArray();
            $totalPerUser = $usersProfitArray[$user->getUsername()]['total'];
        ?>
        <li>Portfolio profit: <?php echo $totalPerUser; ?></li>
        <form method="POST" action="../controllers/UserProfile.php">
            <input type="hidden" name="userIdToPresent" value="<?php echo $user->getId(); ?>">

            <input type="submit" value="<?php $user->getUsername(); ?>">
        </form>
    </ul>
    </br>
    <?php } ?>
</ul>

<h2></h2>
</html>