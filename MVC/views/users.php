<?php 
    require("../controllers/UsersController.php");

    $controller = new UsersController();

    if(isset($_GET['createUser']))
    {
        $controller->createUser($_GET['name'], $_GET['email']);
    }
    


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Users</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }

        tr:nth-child(even) {
        background-color: #dddddd;
        }
</style>
</head>
<body>
<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
  </tr>
  <?php 
    foreach($controller->getAllUsers() as $user)
    {
        echo  "<tr>".
            "<td>".$user['id']."</td>".
            "<td>".$user['name']."</td>".
            "<td>".$user['email']."</td>".
            "</tr>";
    }
  ?>
</table>

<form action="" method="GET">

<input name="name" placeholder="name">
<input name="email" placeholder="email">
<input type="submit" name="createUser" value="Create User" >

</form>

    


    
</body>
</html>