<?php
require("connection.php");

class Contact
{
    static $tableName = "contacts";

    static function getAllContacts()
    {
        $sql = "SELECT * FROM ".Contact::$tableName;
        $dbConn = new Connection();
        $dbConn->createConnection();
        $result = $dbConn->executeQuery($sql);
        if($result->num_rows == 0)
        {
            return [];
        }
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $dbConn->closeConnection();
        return $rows;
    }

    static function getContactById($id)
    {
        $sql = "SELECT * FROM ".Contact::$tableName." WHERE id = ".$id;
        $dbConn = new Connection();
        $dbConn->createConnection();
        $result = $dbConn->executeQuery($sql);
        $row = mysqli_fetch_object($result);
        $dbConn->closeConnection();
        return $row;
    }


    static function createContact($name, $email, $mobile)
    {
        $sql = "INSERT INTO ".Contact::$tableName. " (name, email, mobile) VALUES ('$name', '$email', '$mobile')";
        $dbConn = new Connection();
        $dbConn->createConnection();
        $result = $dbConn->executeQuery($sql);
        $lastId = $dbConn->getLastInsertedId();
        if(!$result)
        {
            return -1;
        }
        $dbConn->closeConnection();
        return $lastId;
    }

    static function updateContact($id, $name, $email, $mobile)
    {
        $sql = "UPDATE ".Contact::$tableName. " SET name = '$name', email='$email', mobile='$mobile' WHERE id = ".$id;
        $dbConn = new Connection();
        $dbConn->createConnection();
        $result = $dbConn->executeQuery($sql);
        $dbConn->closeConnection();
        return $result;
    }

    static function deleteContact($id)
    {
        $sql = "DELETE FROM ".Contact::$tableName. " WHERE id = ".$id;
        $dbConn = new Connection();
        $dbConn->createConnection();
        $result = $dbConn->executeQuery($sql);
        $dbConn->closeConnection();
        return $result;
    }

}



?>