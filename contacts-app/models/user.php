<?php
require("connection.php");

class User
{
    static $tableName = "users";

    static function login($email, $password)
    {
        $sql = "SELECT * FROM ".User::$tableName." WHERE email = '".$email."'";
        $dbConn = new Connection();

        $dbConn->createConnection();
        $result = $dbConn->executeQuery($sql);
        $row = mysqli_fetch_object($result);

        $loggedUserId = -1;
        if($row == NULL)
        {
            return $loggedUserId;
        }
        if($row->password == $password)
        {
            $loggedUserId = $row->id;
        }
        $dbConn->closeConnection();
        return $loggedUserId;
    }

    static function createUser($email, $password)
    {
        $sql = "INSERT INTO ".User::$tableName." (email, password) VALUES ('$email', '$password')";
        $dbConn = new Connection();
        $dbConn->createConnection();
        $result = $dbConn->executeQuery($sql);
        $dbConn->closeConnection();
        return $result;
    }

}



?>