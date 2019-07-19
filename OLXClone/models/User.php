<?php 

require_once("Connection.php");

class User
{

    static function login($email, $password)
    {
        $conn = new Connection();
        $conn->createConnection();

        $result = $conn->executeQuery("SELECT * FROM users WHERE email = '$email'");

        $user = mysqli_fetch_object($result);

        $conn->closeConnection();
        if($user == null)
        {
            return $user;
        }

        if($user->password == $password)
        {
            return $user;
        }

        return null;


    }

    static function signup($name, $password, $mobile, $email)
    {
        $conn = new Connection();
        $conn->createConnection();

        $result = $conn->executeQuery("INSERT INTO users (name, email, password, mobile) VALUES ('$name', '$email', '$password', '$mobile') ");

        $lastId = -1;
        if($result)
        {
            $lastId = $conn->getLastInsertedId();
        }
        $conn->closeConnection();

        return $lastId;


    }

}




?>