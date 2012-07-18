<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/18/12
 * Time: 12:44 PM
 * To change this template use File | Settings | File Templates.
 */

$path = "/home/eyal/Dropbox/Workspace/Code/Learning/PHP/FinalProject/FinalProject/src";

include_once $path . "/obj/Position.php";
include_once $path . "/obj/PositionToDB.php";
include_once $path . "/obj/UserToDB.php";
include_once $path . "/obj/User.php";

class PopulateDB
{
    public $userToDB;
    public $positionToDB;
    public function __construct() {
        $this->userToDB = new UserToDB();
        $this->positionToDB = new PositionToDB();
    }

    public function DB1() {
        $this->emptyDBs();

        $user1 = new User("Elram", "elrampass", "elram@elram");
        $user2 = new User("Assaf", "assafpass", "assaf@assaf");
        $user3 = new User("Keren", "kerenpass", "keren@keren");

        $this->userToDB->insertToDB($user1);
        $this->userToDB->insertToDB($user2);
        $this->userToDB->insertToDB($user3);

        $users = $this->userToDB->getAllUsers();
        $user1 = $users[0];
        $user2 = $users[1];
        $user3 = $users[2];

        $user1->buyStock("IDF", 150, 200);
        $user1->buyStock("IDF", 250, 300);
        $user1->buyStock("IDF", 350, 400);

        $user2->buyStock("IDF", 150, 154);
        $user2->buyStock("IDF", 250, 245);
        $user2->buyStock("IDF", 450, 706);

        $user3->buyStock("IDF", 550, 220);
        $user3->buyStock("IDF", 250, 10);
        $user3->buyStock("IDF", 350, 50);

        $this->userToDB->updateUser($user1);
        $this->userToDB->updateUser($user2);
        $this->userToDB->updateUser($user3);
    }

    public function emptyDBs() {
        // delete users DB
        $this->userToDB->deleteAllRows();

        // delete positions DB
        $this->positionToDB->deleteAllRows();
    }
}

class TestPopulateDB
{
    public function testDB1() {
        $populateDB = new PopulateDB();

        $populateDB->DB1();
    }

    public function testEmptyDBs() {
        $populateDB = new PopulateDB();

        $populateDB->emptyDBs();
    }
}
