<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/18/12
 * Time: 5:50 PM
 * To change this template use File | Settings | File Templates.
 */

if (!isset($_SESSION))
    session_start();

include_once('../obj/YahooStock.php');

$objYahooStock = new YahooStock;

/**
Add format/parameters to be fetched

s = Symbol
n = Name
l1 = Last Trade (Price Only)
d1 = Last Trade Date
t1 = Last Trade Time
c = Change and Percent Change
v = Volume
 */
$objYahooStock->addFormat("snl1d1t1cv");

/**
Add company stock code to be fetched

msft = Microsoft
amzn = Amazon
yhoo = Yahoo
goog = Google
aapl = Apple
 */
$objYahooStock->addStock("msft");
$objYahooStock->addStock("amzn");
$objYahooStock->addStock("yhoo");
$objYahooStock->addStock("goog");
$objYahooStock->addStock("vgz");

include_once "../views/StocksList.php";