<?php 
require("connection.php");
$id = $_GET["id"];

$sql = "DELETE FROM users WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

?>