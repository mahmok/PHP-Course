<?php 

require("Connection.php");

class User
{
    static function insert($name, $email)
    {
        $conn = new Connection();
        $conn->createConnection();
        $result = $conn->executeQuery("INSERT INTO users (name, email) VALUES ('$name', '$email')");
        $lastId = $conn->getLastInsertedId();
        if(!$result)
        {
            return -1;
        }
        $conn->closeConnection();
        return $lastId;  
    }

    static function get()
    {
        $conn = new Connection();
        $conn->createConnection();

        $result = $conn->executeQuery("SELECT * FROM users");

        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $conn->closeConnection();

        return $result;
    }

}




?>