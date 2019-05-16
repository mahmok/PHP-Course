<?php 
require("connection.php");

if(isset($_POST['email']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $id = $_POST['id'];
    $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    return;
    
}
else
{
    $id = $_GET["id"];
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}


?>

<html>
    <head>
        <title>Users DB</title>
    </head>

    <body>
        <form action="update.php" method="post">
            <input hidden="true" name="id" value="<?php echo $row['id'] ?>" >
            Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" > <br>
            Email: <input type="email" name="email" value="<?php  echo $row['email']; ?>" > <br>
            <input type="submit"  value="Confirm Update">
        </form>



    </body>

</html>