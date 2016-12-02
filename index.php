<?php

//error_reporting(E_ALL);
//ini_set("display_errors", 1);

$connection = new PDO('pgsql:host=ec2-54-225-70-21.compute-1.amazonaws.com dbname=ddks35jk9toauo user=mxjitkvjncwnne password=T8vo8fBPtK-Ea6PUTCKOqMbHsP');

if (!$connection) {
    echo "no connect";
} else {

//вход под существующем пользователем
    if (isset($_POST['username']) && isset($_POST['pass'])) {

        $responceApp = new User_Data($_POST['username'], $_POST['pass'], $connection);
        echo $responceApp->getUserData();

    }

//создание нового пользователя
    if (isset($_POST['new-username']) && isset($_POST['new-pass'])) {

        $responceApp = new User_Data($_POST['new-username'], $_POST['new-pass'], $connection);
        echo $responceApp->setNewUser();

    }
}

// класс для обработки полученных данных
class User_Data
{

    private $username;
    private $password;
    private $connection;
    private $logintime;


    function User_Data($username, $password, $connection)
    {

        $this->password = md5($password . "salt=)");
        $this->username = $username;
        $this->connection = $connection;
        $this->logintime = date('U');

    }

    function getUserData()
    {

        if ($this->userIsset()) {

            $query = $this->connection->query("UPDATE users SET logintime='$this->logintime' WHERE username='$this->username' AND password='$this->password' ");
            $query = $this->connection->query("SELECT id, username, password, logintime FROM users ORDER BY logintime DESC ");
            $rows = array();

            foreach ($query as $r) {
                $rows[] = $r;
            }

            return json_encode($rows);

        } else {
            $wrong = "wrong password or username";
            return $wrong;
        }

    }

    function userIsset()
    {

        $search_user = $this->connection->query("SELECT id FROM users WHERE username='$this->username' AND password='$this->password'");
        $user_valid = $search_user->fetchColumn();
        if ($user_valid > 0)
            return true;
        else
            return false;

    }

    function loginIsset()
    {

        $search_user = $this->connection->query("SELECT id, username, password, logintime FROM users WHERE username='$this->username'");
        $user_valid = $search_user->fetchColumn();
        if ($user_valid > 0)
            return true;
        else
            return false;

    }

    function setNewUser()
    {

        if (!$this->loginIsset()) {
            $add_user = $this->connection->query("INSERT INTO users (username, password, logintime) VALUES ('$this->username', '$this->password', '$this->logintime');");
            return $this->getUserData();
        } else {
            $userExists = "user with this login already exists";
            return $userExists;
        }
    }

}


?>
