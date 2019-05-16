<?php
require("connection.php");
$id = $_GET["id"];

$sql = "DELETE FROM users WHERE id=$id";
$conn->exec($sql);
echo "User deleted successfully";


?>