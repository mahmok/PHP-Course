<?php 
    session_start();
    if(isset($_COOKIE['saved_username']))
    {
        $_SESSION['username'] = $_COOKIE['saved_username'];
        header("Location: home.php");
    }



?>


<html>
    <head>
        <title>Login Simulation</title>
    </head>

    <body>
        <form action="login.php" method="post">
            Username: <input type="text" name="username" /> <br>
            Remember Me: <input type="checkbox" name="rememberme" /> <br>
            <input type="submit" value="submit" />
        </form>


    </body>



</html>