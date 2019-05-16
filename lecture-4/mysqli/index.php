<?php 

?>
<html>
    <head>
        <title>Users DB</title>
    </head>

    <body>
        <form action="create.php" method="post">
            Name: <input type="text" name="name" > <br>
            Email: <input type="email" name="email" > <br>
            <input type="submit"  value="Create">
        </form>


        <form action="users.php" method="get">
            <input type="submit" value="Go To Users Page" >
        </form>


    </body>

</html>