<?php 
    session_start();
    var_dump($_SESSION);
    if(!isset($_SESSION['username']))
    {
        header("Location: index.php");
    }

?>


<html>
    <head>
        <title>Login Simulation</title>
    </head>

    <body>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            File to upload: <input type="file" name="myFile" /> <br>
            <input type="submit" value="submit" />
        </form>

        <hr>

        <form action="logout.php" method="get">
            <input type="submit" value="Logout" />
        </form>


    </body>



</html>