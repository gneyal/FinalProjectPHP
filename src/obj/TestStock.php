<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/13/12
 * Time: 10:01 PM
 * To change this template use File | Settings | File Templates.
 */
class TestStock
{
    // this test should succeed
    public function test1() {
        $stock = new Stock("Google");
        if ("Google" == $stock->getSymbol())
            return true;
    }


}
