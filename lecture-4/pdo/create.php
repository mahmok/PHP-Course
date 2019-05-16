<?php 
require("connection.php");

$name = $_POST["name"];
$email = $_POST["email"];

$sql = "INSERT INTO users (name, email)
VALUES ('$name', '$email')";
try
{
    $conn->exec($sql);
    echo "User created!";
}catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}


?>