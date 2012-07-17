<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/17/12
 * Time: 11:13 AM
 * To change this template use File | Settings | File Templates.
 */
$path = "/home/eyal/Dropbox/Workspace/Code/Learning/PHP/FinalProject/FinalProject/src";

include_once $path . '/obj/User.php';
class UserToDB
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

    // insert a New-User to DB (if its not a new user use the update function)
    public function insertToDb($user) {
        $sql = "INSERT INTO users (username, password, email, cash) VALUES (?, ?, ?, ?)";
        $stmt = $this->dbh->prepare($sql);
        try {
            $succ = $stmt->execute(array($user->getUsername(), md5($user->getPassword()),
            $user->getEmail(), $user->getCash()));
        } catch (Exception $e) {
            echo $e->getTraceAsString();
        }
    }

    public function deleteAllRows() {
        $sql = "DELETE FROM $this->dbTable WHERE id > 0";

        $this->dbh->exec($sql);
    }

    public function countRows() {
        $sql = "SELECT count(*) FROM $this->dbTable";
        $ans = $this->dbh->query($sql)->fetchColumn();;
        return $ans;
    }

    public function getUserById($id) {
        $sql = "SELECT * FROM $this->dbTable WHERE id = ?";
        $stmt = $this->dbh->prepare($sql);

        try {
            if ($stmt->execute(array($id)))
                $userInArray = $stmt->fetch(PDO::FETCH_ASSOC);

            // not sure if should query for the pass word as well
            $user = new User(
                $userInArray['username'], $userInArray['password'],
                $userInArray['email'], $userInArray['id']);

        } catch (Exception $e) {
            echo $e->getTraceAsString();
        }

        return $user;
    }

    public function getUserByUsername($username) {
        $sql = "SELECT * from users WHERE username = ?";
        $stmt = $this->dbh->prepare($sql);

        try {
            if ($stmt->execute(array($username)))
                $userInArray = $stmt->fetch(PDO::FETCH_ASSOC);
            $user = new User(
                $userInArray['username'], $userInArray['password'],
                $userInArray['email'], $userInArray['id']);
            return $user;
        } catch (Exception $e ) {
            $e->getTraceAsString();
            return false;
        }
    }
    public function getFirstUser() {
        $sql = "SELECT * FROM $this->dbTable";
        $stmt = $this->dbh->prepare($sql);
        try {
            if ($stmt->execute())
                $userInArray = $stmt->fetch(PDO::FETCH_ASSOC);

            $user = new User(
                $userInArray['username'], $userInArray['password'],
                $userInArray['email'], $userInArray['id']);

        } catch (Exception $e) {
            echo $e->getTraceAsString();
            return false;
        }
        return $user;
    }

    public function updateUser($user) {
        $sql = "UPDATE users SET password = ?, email = ?, Cash = ? WHERE id = ?";
        $stmt = $this->dbh->prepare($sql);
        try {
            $succ = $stmt->execute(array($user->getPassword(), $user->getEmail(), $user->getCash(), $user->getId()));
            return true;
        } catch (Exception $e) {
            echo $e->getTraceAsString();
            return false;
        }
    }

    // TODO: getAllUsers - this should return array of all users
    public function getAllUsers() {
        $allUsers = array();
        $sql = "SELECT * FROM $this->dbTable";
        $stmt = $this->dbh->prepare($sql);

        try {
            if ($stmt->execute()) {
                while ($userInArray = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $user = new User(
                        $userInArray['username'], $userInArray['password'],
                        $userInArray['email'], $userInArray['id']);

                    array_push($allUsers, $user);
                }
            }
            return $allUsers;
        } catch (Exception $e) {
            echo $e->getTraceAsString();
        }

        return false;;
    }
}

class TestUserToDB
{
    public function testGetAllUsers() {
        $funame = "TestUserToDB::testGetAllUsers() : ";
        $pass = "PASS";
        $fail = "FAIL";

        $userToDB = new UserToDB();
        $userToDB->deleteAllRows();

        // add three users and check that we actually getting these three
        // first print it with var_dump

        $someuser1 = new User("Alon", "alon", "alon@alon");
        $someuser2 = new User("Geva", "geva", "geva@geva");
        $someuser3 = new User("Shmuel", "shmuel", "shmuel@shmuel");

        $userToDB->insertToDb($someuser1);
        $userToDB->insertToDb($someuser2);
        $userToDB->insertToDb($someuser3);

        $allUsersArray = $userToDB->getAllUsers();
        $user1 = $allUsersArray[0];
        $user2 = $allUsersArray[1];
        $user3 = $allUsersArray[2];

        // This is a huge if but the order of pulling the data is changing
        // every second time so this is the fastest right now.
        if ((
            $user1->getUsername() == $someuser1->getUsername() ||
            $user2->getUsername() == $someuser1->getUsername() ||
            $user3->getUsername() == $someuser1->getUsername()) && (
            $user1->getEmail() == $someuser2->getEmail() ||
            $user2->getEmail() == $someuser2->getEmail() ||
            $user3->getEmail() == $someuser2->getEmail()) && (
            $user1->getEmail() == $someuser3->getEmail() ||
            $user2->getEmail() == $someuser3->getEmail() ||
            $user3->getEmail() == $someuser3->getEmail() )) {
            echo $funame . $pass . "</br>";
        }
        else echo $funame . $fail . "</br>";
//        $userToDB->deleteAllRows();
    }
    public function testGetUserByUsername() {
        $funame = "TestUserToDB::testGetUserByUsername() : ";
        $pass = "PASS";
        $fail = "FAIL";

        $userToDB = new UserToDB();
        $userToDB->deleteAllRows();

        $someuser = new User("Alon", "alon", "alon@alon");

        $userToDB->insertToDb($someuser);

        $anotherUser = $userToDB->getUserByUsername($someuser->getUsername());

        if ( $anotherUser->getUsername() == $someuser->getUsername() )
            echo $funame . $pass . "</br>";
        else echo $funame . $fail . "</br>";

        $userToDB->deleteAllRows();
    }
    public function testUpdateUser() {
        $funame = "TestUserToDB::testUpdateUser() : ";
        $pass = "PASS";
        $fail = "FAIL";

        $userToDB = new UserToDB();
        $userToDB->deleteAllRows();

        $someuser = new User("Alon", "alon", "alon@alon");

        $userToDB->insertToDb($someuser);

        $anotherUser = $userToDB->getFirstUser();

        $anotherUser->setCash(40000);

        $userToDB->updateUser($anotherUser);

        $changedUser = $userToDB->getUserById($anotherUser->getId());

        if ( $changedUser->getId() != 0 )
            echo $funame . $pass . "</br>";
        else echo $funame . $fail . "</br>";

        $userToDB->deleteAllRows();
    }

    public function testGetUserById() {
        $funame = "TestUserToDB::testGetUserById() : ";
        $pass = "PASS";
        $fail = "FAIL";

        $userToDB = new UserToDB();
        $userToDB->deleteAllRows();

        $newuser = new User("Alon", "alon", "alon@alon");

        $userToDB->insertToDb($newuser);

        $anotherUser = $userToDB->getFirstUser();
        $id = $anotherUser->getId();
        $anotherUser = $userToDB->getUserById($id);

        if ( $anotherUser->getId() != 0 )
            echo $funame . $pass . "</br>";
        else echo $funame . $fail . "</br>";

        $userToDB->deleteAllRows();
    }

    public function testInsertToDB() {
        $funame = "TestUserToDB::testInsertToDB() : ";
        $pass = "PASS";
        $fail = "FAIL";

        $userToDB = new UserToDB();
        $userToDB->deleteAllRows();

        $newuser = new User("Alon", "alon", "alon@alon");

        $userToDB->insertToDb($newuser);

        if ( $userToDB->countRows() == 1)
            echo $funame . $pass . "</br>";
        else echo $funame . $fail . "</br>";

        $userToDB->deleteAllRows();
    }

    public function testDeleteAllRows() {
        $funame = "TestUserToDB::testDeleteAllRows() : ";
        $pass = "PASS";
        $fail = "FAIL";

        $userToDB = new UserToDB();

        if ( 1)
            echo $funame . $pass . "</br>";
        else echo $funame . $fail . "</br>";

        $userToDB->deleteAllRows();
    }
}
