<?php 
require("connection.php");

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);


?>
<html>
    <head>
        <title>Users DB</title>
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
        <h1>Users</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php 
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>"
                            ."<td>".$row["id"]."</td>"
                            ."<td>".$row["name"]."</td>"
                            ."<td>".$row["email"]."</td>"
                            ."<td> <form action='delete.php'>"
                            ."<input hidden='true' name='id' value='".$row['id']."'>"
                            ."<input type='submit' value='Delete' ></form>"
                            ."<form action='update.php'>"
                            ."<input hidden='true' name='id' value='".$row['id']."'>"
                            ."<input type='submit' value='Update' ></form>"
                            ."</td>"
                            ."</tr>";
                    }
                
                ?>
            
            </tbody>
        </table>
        


    </body>

</html>