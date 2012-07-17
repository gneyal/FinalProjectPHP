<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/13/12
 * Time: 11:18 AM
 * To change this template use File | Settings | File Templates.
 */
$path = "/home/eyal/Dropbox/Workspace/Code/Learning/PHP/FinalProject/FinalProject/src";

class UserToDBOriginal
{
    public $dbUri  = 'mysql:host=127.0.0.1;dbname=Goldenbear';
    public $dbUser = 'eyal';
    public $dbPass = 'eyalpassword';
    public $dbTable = 'users';
    public $dbh;

    public function __construct() {
        $this->dbh = new PDO($this->dbUri, $this->dbUser, $this->dbPass, array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ));
    }

    // insert User to DB
    public function insertToDb($user) {
        $sql = "INSERT INTO users (username, password, email, cash) VALUES (?, ?, ?, ?)";
        $stmt = $this->dbh->prepare($sql);
        $succ = $stmt->execute(array($user->getUsername(), md5($user->getPassword()), $user->getEmail(), $user->getCash()));
    }

    // delete User from DB
    public function deleteFromDb($user) {
        $sql = "DELETE FROM users WHERE username = ?";
        $stmt = $this->dbh->prepare($sql);
        $succ = $stmt->execute(array($user->getUsername()));
    }

    // update User in DB
    public function updateDb($user) {
        $sql = "UPDATE users SET password = ?, email = ?, Cash = ? WHERE username = ?";
        $stmt = $this->dbh->prepare($sql);
        $succ = $stmt->execute(array($user->getPassword(), $user->getEmail(), $user->getCash(), $user->getUsername()));
    }

    public function getUserByUsername($username) {
        $sql = "SELECT * from users WHERE username = ?";
        $stmt = $this->dbh->prepare($sql);

        if ($stmt->execute(array($username)))
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user;
    }
}

include_once $path . '/obj/User.php';

class TestDbHelper {
    // not working when there is another user with the same name (uncaught exception)
    public function testInsertToDb() {
        $dbhelper = new DbHelper();

        $username = "Matt";
        $password = "MattPassword";
        $email = "matt@matt";

        $user = new User($username, $password, $email);

        $dbhelper->insertToDb($user);
    }

    public function testDeleteFromDb() {
        $dbhelper = new DbHelper();

        $username = "Matt";
        $password = "MattPassword";
        $email = "matt@matt";

        $user = new User($username, $password, $email);
        $dbhelper->deleteFromDb($user);
    }

    public function testUpdateDb() {
        $dbhelper = new DbHelper();

        $username = "Matt";
        $password = "MattPasswordHasChanged";
        $email = "matt@matt";
        $someRandomAmount = "293";

        $user = new User($username, $password, $email);
        $user->setCash($someRandomAmount);
        $dbhelper->updateDb($user);
    }
}



