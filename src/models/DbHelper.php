<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/13/12
 * Time: 11:18 AM
 * To change this template use File | Settings | File Templates.
 */
class DbHelper
{
    public $dbUri  = 'mysql:host=127.0.0.1;dbname=Goldenbear';
    public $dbUser = 'eyal';
    public $dbPass = 'eyalpassword';
    public $dbh;

    public function __construct() {
        $this->dbh = new PDO($this->dbUri, $this->dbUser, $this->dbPass, array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ));
    }

    // insert User to DB
    public function insertToDb($user) {
        $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
        $stmt = $this->dbh->prepare($sql);
        $succ = $stmt->execute(array($user->getUsername(), md5($user->getPassword()), $user->getEmail()));
        var_dump($succ);
    }

    // delete User from DB
    public function deleteFromDb($user) {
        $sql = "DELETE FROM users WHERE username = ?";
        $stmt = $this->dbh->prepare($sql);
        $succ = $stmt->execute(array($user->getUsername()));
        var_dump($succ);
    }

    // update User in DB
    public function updateDb($user) {
        $sql = "UPDATE users SET password = ?, email = ? WHERE username = ?";
        $stmt = $this->dbh->prepare($sql);
        $succ = $stmt->execute(array($user->getPassword(), $user->getEmail(), $user->getUsername()));
        var_dump($succ);
    }

    public function getUserByUsername($username) {
        $sql = "SELECT * from users WHERE username = ?";
        $stmt = $this->dbh->prepare($sql);

        if ($stmt->execute(array($username)))
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
//        var_dump($user);
        return $user;
    }
}
